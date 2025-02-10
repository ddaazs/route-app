<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index(){
        return response('Hello World',200)
        ->header('Content-Type','text/plain')
        ->header('X-Signature','Header Value')
        ->header('X-header-Two','Header Value');
    }
}
