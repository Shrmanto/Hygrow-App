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

        if($roleuser == 'admin'){
            return view('home');
        }elseif($roleuser == 'mitra'){
            return view('home');
        }elseif($roleuser == 'customer'){
            return view('home');
        }else{
            return redirect('/logout');
        }
    }
}
