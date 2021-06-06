<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CompanyController extends Controller
{
    public function index(){
        $company = auth()->user()->company;
        return view('backend.admin.company.edit', compact('company'));
    }

    public function update(Request $request){

        //dd($request->all());
        $request->validate([
           'name'   =>  'required|string',
           'reporting_email'    =>  'required|email',
           'logo'   =>  'nullable|image|max:800',

           'invoice_sms_to_receiver_at_receive'   =>  'nullable|boolean',
           'invoice_sms_to_receiver_at_on_going'   =>  'nullable|boolean',
           'invoice_sms_to_receiver_at_delivered'   =>  'nullable|boolean',
           'invoice_sms_to_sender_at_receive'   =>  'nullable|boolean',
           'invoice_sms_to_sender_at_on_going'   =>  'nullable|boolean',
           'invoice_sms_to_sender_at_delivered'   =>  'nullable|boolean',
           'conditional_invoice_sms_to_receiver_at_receive'   =>  'nullable|boolean',
           'conditional_invoice_sms_to_receiver_at_on_going'   =>  'nullable|boolean',
           'conditional_invoice_sms_to_receiver_at_delivered'   =>  'nullable|boolean',
           'conditional_invoice_sms_to_receiver_at_break'   =>  'nullable|boolean',
           'conditional_invoice_sms_to_sender_at_receive'   =>  'nullable|boolean',
           'conditional_invoice_sms_to_sender_at_on_going'   =>  'nullable|boolean',
           'conditional_invoice_sms_to_sender_at_delivered'   =>  'nullable|boolean',
           'conditional_invoice_sms_to_sender_at_break'   =>  'nullable|boolean',
           'sms_chalan_information_to_receiver_branch'   =>  'nullable|boolean',
           'custom_sms_to_random_number'   =>  'nullable|boolean',
        ]);

        $company = auth()->user()->company;
        $company->name              =   $request->name;
        $company->reporting_email   =   $request->reporting_email;

        $company->invoice_sms_to_receiver_at_receive            =   $request->invoice_sms_to_receiver_at_receive ?? null;
        $company->invoice_sms_to_receiver_at_on_going           =   $request->invoice_sms_to_receiver_at_on_going ?? null;
        $company->invoice_sms_to_receiver_at_delivered          =   $request->invoice_sms_to_receiver_at_delivered ?? null;
        $company->invoice_sms_to_sender_at_receive              =   $request->invoice_sms_to_sender_at_receive ?? null;
        $company->invoice_sms_to_sender_at_on_going             =   $request->invoice_sms_to_sender_at_on_going ?? null;
        $company->invoice_sms_to_sender_at_delivered            =   $request->invoice_sms_to_sender_at_delivered ?? null;
        $company->conditional_invoice_sms_to_receiver_at_receive    =   $request->conditional_invoice_sms_to_receiver_at_receive ?? null;
        $company->conditional_invoice_sms_to_receiver_at_on_going   =   $request->conditional_invoice_sms_to_receiver_at_on_going ?? null;
        $company->conditional_invoice_sms_to_receiver_at_delivered  =   $request->conditional_invoice_sms_to_receiver_at_delivered ?? null;
        $company->conditional_invoice_sms_to_receiver_at_break      =   $request->conditional_invoice_sms_to_receiver_at_break ?? null;
        $company->conditional_invoice_sms_to_sender_at_receive      =   $request->conditional_invoice_sms_to_sender_at_receive ?? null;
        $company->conditional_invoice_sms_to_sender_at_on_going     =   $request->conditional_invoice_sms_to_sender_at_on_going ?? null;
        $company->conditional_invoice_sms_to_sender_at_delivered    =   $request->conditional_invoice_sms_to_sender_at_delivered ?? null;
        $company->conditional_invoice_sms_to_sender_at_break        =   $request->conditional_invoice_sms_to_sender_at_break ?? null;
        $company->sms_chalan_information_to_receiver_branch         =   $request->sms_chalan_information_to_receiver_branch ?? null;
        $company->custom_sms_to_random_number                       =   $request->custom_sms_to_random_number ?? null;

        if($request->hasFile('logo')){
            if ($company->logo != null)
                File::delete(public_path($company->logo)); //Old image delete
            $image             = $request->file('logo');
            $folder_path       = 'uploads/images/company/logo/';
            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777, true);
            }
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $company->logo = $folder_path.$image_new_name;
        }
        try {
            $company->save();
            return back()->withSuccess('Company successfully updated');
        } catch (\Exception $exception) {
            return back()->withErrors( $exception->getMessage());
        }
    }
}
