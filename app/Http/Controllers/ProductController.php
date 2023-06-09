<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
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
        $product = new Products;
        $product->product_name = $request->product_name;
        $product->images = $request->images;
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('image')->store('image', 'public');

        $data = Image::create([
            'image' => $image_path,
        ]);
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->customer_partner_id = $request->customer_partner_id;
        $product->save();
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
        $product = Products::find($id);
        $product->product_name = $request->product_name;
        $product->images = $request->images;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->update_at = now();
        $product->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
    }

    public function dataProduct(){
        $product = \DB::table('products')
                        ->select('products.id', 'products.product_name', 'products.images', 'products.price', 'products.stock', 'products.description')
                        ->join('users', 'products.customer_partner_id', 'users.id')
                        ->get();
        $no = 0;
        $data = array();
        foreach($product as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->product_name;
            $row[] = $list->images;
            $row[] = $list->price;
            $row[] = $list->stock;
            $row[] = $list->description; 
            '';
            $data[]= $row; 
        }
        $output = array("data" => $data);
        return response()->json($output);

    }
}
