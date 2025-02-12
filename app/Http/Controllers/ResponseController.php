<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\ResponseMacroServiceProvider;
class ResponseController extends Controller
{
    //attach header to response
    public function header(){
        return response('Hello World',200)
        ->header('Content-Type','text/plain')
        ->header('X-Signature','Header Value')
        ->header('X-header-Two','Header Value');
    }

    //attach away
    public function google(){
        return redirect()->away('https://www.google.com');
    }
    //attach cookie
    public function cookie(Request $request){
        return response('Hello World',200)->cookie('ddaass','10',1);
    }

    public function index(){
        return view('response');
    }

    public function controllerCalled(){
        return redirect()->action([ResponseController::class,'index']);
    }

    public function download(){
        $file = public_path('storage/photos/beach.jpg');
        return response()->download($file,'img.jpg');
    }

    public function readfile(){
        $file = public_path('storage/files/Cấu hình Proxy.txt');
        return response()->file($file);
    }

    public function responseStream(){
        return response()->streamDownload(function(){
            echo 'Hello World';
        },'stream.txt');
    }

}
