<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BladeController extends Controller
{
    public function index()
    {
        $users = Auth::user();

        return view('blade', ['user' => $users])->with(['active' => 'active']);

        // return view('blade');
    }

    public function show()
    {
        return redirect()->route('blade.index')->with('success', 'hehe');
    }
}
