<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerifyController extends Controller
{
    public function show(){
        return view('auth.verify-email');
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('welcome')->with('status','email verified');
    }

    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status','Verification link sent!');
    }
}
