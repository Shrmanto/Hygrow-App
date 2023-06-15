<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $this->param['getProducts'] = Products::all();
        return view('mitraMain.productm.index', $this->param);
    }

    public function addToCart($id)
    {
        Products::where('id', $request->id)->update(['status_cart'=>'sudah dikeranjang']);

        return redirect()->back()->with('success', 'berhasil masukkan ke keranjang');
    }
}
