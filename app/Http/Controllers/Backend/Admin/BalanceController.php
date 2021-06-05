<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BalanceController extends Controller
{
    public function index(){
        $transactions = auth()->user()->company->transactions()->where('status', '!=', 'Approved')->where('type', 'Credit')->orderBy('id', 'desc')->get();
        return view('backend.admin.balance.index', compact('transactions'));
    }

    public function add(Request $request){
        $request->validate([
            'amount'    =>  'required|numeric|min:1',
            'payment_method'    =>  'required|string',
            'receipt'   =>  'nullable|image',
            'transaction'   =>  'nullable|string',
        ]);

        $transaction = new Transaction();
        $transaction->company_id    =  auth()->user()->company->id;
        $transaction->creator_id    =  auth()->user()->id;
        $transaction->type    =  'Credit';
        $transaction->purpose    =  'Balance add';
        $transaction->amount    =   $request->amount;
        $transaction->method    =   $request->payment_method;
        $transaction->transaction   =   $request->transaction;
        if($request->hasFile('receipt')){
            $image             = $request->file('receipt');
            $folder_path       = 'uploads/images/company/transaction-receipt/';
            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777, true);
            }
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $transaction->receipt = $folder_path.$image_new_name;
        }
        try{
            $transaction->save();
            return back()->withSuccess('Successfully submitted');
        } catch (\Exception $exception) {
            return back()->withErrors( $exception->getMessage());
        }
    }
}
