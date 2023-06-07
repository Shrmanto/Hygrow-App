<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function index1()
    {
        return view('welcome');
    }

    public function index2()
    {
        return view('custMain.landing');
    }

    public function index3()
    {
        return view('custMain.landing');
    }

    public function about()
    {
        return view('about');
    }

    public function about2()
    {
        return view('custMain.about');
    }

    // public function hygrmart()
    // {
    //     return view('hygmart');
    // }
}
