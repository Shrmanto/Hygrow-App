<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Partners;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductmController extends Controller
{

    public function index()
    {
        $this->param['getProducts'] = Products::all();
        return view('mitraMain.productm.index', $this->param);
    }

    public function create()
    {
        return view('mitraMain.productm.form');
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

        return redirect('/productm');
    }

    public function show($id)
    {
        $this->param['getDetailProducts'] = Products::find($id);
        return view('mitraMain.productm.edit', $this->param);

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

        return redirect('/productm');
    }

    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect('/productm');

    }

    public function dataProductm(){
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
            $row[] =  '<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="editData('.$list->id.')"><i class="fas fa-edit" style="color: #ffffff;"></i>';
            $row[] =  '<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteData('.$list->id.')"><i class="far fa-trash-alt" style="color: #ffffff;"></i></a>';
            '';
            $data[]= $row; 
        }
        $output = array("data" => $data);
        return response()->json($output);

    }
}
