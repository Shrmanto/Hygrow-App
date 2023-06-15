<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrdercController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->param['getOrders'] = \DB::table('orders')
        ->select('products.product_name', 'products.images', 'products.price', 'users.name', 'orders.status_payment', 'orders.id')
        ->join('products', 'orders.product_id', 'products.id')
        ->join('users', 'orders.user_id', 'users.id')
        ->get();
        return view ('orderc.index',  $this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Products;
        $request->validate([
            'images'=>'required|mimes:jpg,jpeg,png|max:5000',
        ]);

        $image = $request->file('images');
        $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $request->images->move(public_path('uploads'), $fileName);
        $img_url = 'uploads/' . $fileName;

        $order->product_name = $request->product_name;
        $order->images = $img_url;
        $order->price = $request->price;
        $order->stock = $request->stock;
        $order->description = $request->description;
        
        $order->customer_partner_id = $request->customer_partner_id;
        $order->save();

        return redirect('/orderc');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Products::find($id);
        $request->validate([
            'images'=>'required|mimes:jpg,jpeg,png|max:5000',
        ]);

        $image = $request->file('images');
        $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $request->images->move(public_path('uploads'), $fileName);
        $img_url = 'uploads/' . $fileName;

        $order->product_name = $request->product_name;
        $order->images = $img_url;
        $order->price = $request->price;
        $order->stock = $request->stock;
        $order->description = $request->description;
        
        $order->customer_partner_id = $request->customer_partner_id;
        $order->update();

        return redirect('/orderc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function accPayment(Request $request, $id)
    {
        Orders::where('id', $request->id)->update(['status_payment'=>'sudah dibayar']);

        return redirect()->back()->with('success', 'berhasil acc');
    }
}
