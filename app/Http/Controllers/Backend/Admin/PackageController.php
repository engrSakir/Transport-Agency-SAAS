<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PurchasePackage;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::where('is_active', true)->get();
        return view('backend.admin.package.index', compact('packages'));
    }

    public function buy(Request $request){
        $request->validate([
            'package' => 'required|exists:packages,id'
        ]);

        $package = Package::where('is_active', true)->where('id', $request->package)->first();
        if(!$package){
            return response()->json([
                'type' => 'info',
                'message' => 'Package is not valid now'
            ]);
        }

        $company = auth()->user()->company;
        $company_branch_availability_check = null;
        if($company->branches->count() > $package->branch){
            $company_branch_availability_check = $company->name.'এর মোট ব্রাঞ্চ সংখ্যা '.$company->branches->count().' টি। কিন্তু এই প্যাকেজের ধারণ ক্ষমতা '.$package->branch.' টি।';
        }

        $company_admin_availability_check = null;
        if($company->admins->count() > $package->admin){
            $company_admin_availability_check = $company->name.'এর মোট অ্যাডমিন সংখ্যা '.$company->admins->count().' টি। কিন্তু এই প্যাকেজের ধারণ ক্ষমতা '.$package->admin.' টি।';
        }

        $company_manager_availability_check = null;
        if($company->managers->count() > $package->manager){
            $company_manager_availability_check = $company->name.' এর মোট অ্যাডমিন সংখ্যা '.$company->managers->count().' টি। কিন্তু এই প্যাকেজের ধারণ ক্ষমতা '.$package->manager.' টি।';
        }

        if($company_branch_availability_check || $company_admin_availability_check || $company_manager_availability_check){
            return response()->json([
                'type' => 'info',
                'message' => $company_branch_availability_check .' '. $company_admin_availability_check .' '. $company_manager_availability_check  .' তাই এই প্যাকেজটি আপনার জন্য প্রযোজ্য নয়। দয়া করে অন্য প্যাকেজ পছন্দ করুন।'
            ]);
        }

        if(auth()->user()->company->transactions()->where('status', 'Approved')->where('type', 'Credit')->sum('amount')
            - auth()->user()->company->transactions()->where('status', 'Approved')->where('type', 'Debit')->sum('amount') < $package->price){
            return response()->json([
                'type' => 'info',
                'message' => 'এই প্যাকেজটির ক্রয় মূল্য সমতুল্য টাকা কোম্পানি একাউন্টে জমা নেই। দয়া করে আগে টাকা জমা করুন এবং পরে প্যাকেজ ক্রয় করুন।'
            ]);
        }

        $transaction = new Transaction();
        $transaction->company_id = $company->id;
        $transaction->creator_id = auth()->user()->id;
        $transaction->type = 'Debit';
        $transaction->amount = $package->price;
        $transaction->method = 'Balance';
        $transaction->purpose = 'Purchase new package. '.$package->name;
        $transaction->status = 'Approved';
        $transaction->save();

        $purchase_package = new PurchasePackage();
        $purchase_package->company_id   =   $company->id;
        $purchase_package->package_id   =   $request->package;
        $purchase_package->save();

         return response()->json([
             'type' => 'success',
             'message' => 'সফলভাবে প্যাকেজটি পরিবর্তন করা হয়েছে'
         ]);

    }
}
