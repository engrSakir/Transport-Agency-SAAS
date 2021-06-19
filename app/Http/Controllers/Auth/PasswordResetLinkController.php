<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.

        if(is_numeric($request->input('email'))){
            $user = \App\Models\User::where('phone', $request->email)->first();
            if(!$user){
                return back()->withErrors('এই নাম্বারটি আমাদের ডেটাবেজ রেকর্ডে পাওয়া যাচ্ছে না।');
            }
            $password = Str::random(4);
            if(application_sms_sender($request->email, 'ট্রান্সপোর্ট এজেন্সি সফটওয়্যারে লগইন করার নতুন পাসওয়ার্ড হচ্ছে: '. $password) == "SUCCESS"){
                $user->password = bcrypt($password);
                $user->save();
                return redirect()->route('login')->withSuccess('সফলভাবে নতুন পাসওয়ার্ড আপনার ফোন নাম্বারে পাঠানো হয়েছে।');
            }else{
                return back()->withErrors('সাময়িক সমস্যা থাকার কারনে আমরা আপনার নাম্বারে মেসেজ পাঠাতে ব্যর্থ দয়াকরে ইমেইল ব্যবহার করুন।');
            }
        }elseif (filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status == Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withInput($request->only('email'))
                    ->withErrors(['email' => __($status)]);
        } else{
            $user = \App\Models\User::where('username', $request->email)->first();
            if(!$user){
                return back()->withErrors('এই ইউজারনেম আমাদের ডেটাবেজ রেকর্ডে পাওয়া যাচ্ছে না।');
            }
            $password = Str::random(4);
            if(application_sms_sender($request->email, 'ট্রান্সপোর্ট এজেন্সি সফটওয়্যারে লগইন করার নতুন পাসওয়ার্ড হচ্ছে: '. $password) == "SUCCESS"){
                $user->password = bcrypt($password);
                $user->save();
                return redirect()->route('login')->withSuccess('সফলভাবে নতুন পাসওয়ার্ড আপনার ফোন নাম্বারে পাঠানো হয়েছে।');
            }else{
                return back()->withErrors('সাময়িক সমস্যা থাকার কারনে আমরা আপনার নাম্বারে মেসেজ পাঠাতে ব্যর্থ দয়াকরে ইমেইল ব্যবহার করুন।');
            }
        }
    }
}
