<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function redirect(){
        $roleuser = \Auth::user()->roles()->pluck('name')[0];
        /*dd($roleuser);*/
        if($roleuser == 'admin'){
            return redirect('/adminmain');
        }elseif($roleuser == 'mitra'){
            return redirect('/mitramain');
        }elseif($roleuser == 'customer'){
            return redirect('/custmain');
        }else{
            return redirect('/logout');
        }
    }
}
