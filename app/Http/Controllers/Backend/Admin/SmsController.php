<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(){
        if(!auth()->user()->company->custom_sms_to_random_number){
            return back()->withErrors('সিস্টেমে কাস্টম মেসেজ ফাংশনটি এনাবল করা নেই। দয়া করে আগে এনাবল করুন।');
        }
        $sms_histories = auth()->user()->messageHistories()->orderBy('id', 'desc')->take(25)->get();
        return view('backend.admin.sms.index', compact('sms_histories'));
    }
    public function send(Request $request){
        if(!auth()->user()->company->custom_sms_to_random_number){
            return back()->withErrors('সিস্টেমে কাস্টম মেসেজ ফাংশনটি এনাবল করা নেই। দয়া করে আগে এনাবল করুন।');
        }
        $request->validate([
            'number' => 'required|numeric',
            'message' => 'required|string'
        ]);

        $response = paid_sms_sender($request->number, $request->message);

        if($response == 'SUCCESS'){
            return back()->withSuccess('সফলভাবে ম্যাসেজ পাঠানো হয়েছে।');
        }else{
            return back()->withErrors($response);
        }
    }
}
