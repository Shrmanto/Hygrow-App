<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $this->param['getProducts'] = \DB::table('products')
        ->select('products.product_name', 'products.images', 'products.price', 'products.stock', 'products.description', 'users.name')
        ->join('users', 'products.customer_partner_id', 'users.id')
        ->get();
        return view('product.index', $this->param);
    }

    public function store(Request $request)
    {
        $product = new Products;
        $request->validate([
            'images'=>'required|mimes:jpg,jpeg,png|max:5000',
        ]);

        $image = $request->file('images');
        $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $request->images->move(public_path('uploads'), $fileName);
        $img_url = 'uploads/' . $fileName;

        $product->product_name = $request->product_name;
        $product->images = $img_url;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        
        $product->customer_partner_id = $request->customer_partner_id;
        $product->save();

        return redirect('/product');
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $request->validate([
            'images'=>'required|mimes:jpg,jpeg,png|max:5000',
        ]);

        $image = $request->file('images');
        $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $request->images->move(public_path('uploads'), $fileName);
        $img_url = 'uploads/' . $fileName;

        $product->product_name = $request->product_name;
        $product->images = $img_url;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        
        $product->customer_partner_id = $request->customer_partner_id;
        $product->update();

        return redirect('/product');
    }


    public function dataProduct(){
        $product = \DB::table('products')
                        ->select('products.product_name', 'products.images', 'products.price', 'products.stock', 'products.description', 'users.name')
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
