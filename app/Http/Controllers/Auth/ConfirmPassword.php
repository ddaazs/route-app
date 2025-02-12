<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmPassword extends Controller
{
    public function show(){
        return view('auth.confirm-password');
    }

    public function store(Request $request){

        return redirect()->route('login');
    }
}
