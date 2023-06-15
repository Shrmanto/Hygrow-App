<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Investations;
use App\Models\InvestDetails;
use Illuminate\Http\Request;

class HygmartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->param['getProducts'] = Products::all();
        $this->param['getCart'] = Products::where('status_cart', 'sudah dikeranjang')->get();
        return view('hygmart', $this->param);
    }

    public function hygrovest()
    {
        $this->param['getInvest'] = Investations::all();
        $this->param['getCart'] = Products::where('status_cart', 'sudah dikeranjang')->get();
        return view('hygrovest', $this->param);
    }

    public function index2()
    {
        $this->param['getCart'] = Products::where('status_cart', 'sudah dikeranjang')->get();
        $this->param['totalPrice'] = Products::where('status_cart', 'sudah dikeranjang')->sum('total_price');
        return view('ecommerce.cart', $this->param);
    }

    public function index3()
    {
        $this->param['getCart'] = Products::where('status_cart', 'sudah dikeranjang')->get();
        $this->param['totalPrice'] = Products::where('status_cart', 'sudah dikeranjang')->sum('total_price');
        $this->param['totalOrder'] = Products::where('status_cart', 'sudah dikeranjang')->sum('total_order');

        return view('ecommerce.co', $this->param);
    }

    public function coInvest()
    {
        $this->param['getCart'] = Products::where('status_cart', 'sudah dikeranjang')->get();
        $this->param['totalPrice'] = Products::where('status_cart', 'sudah dikeranjang')->sum('total_price');
        $this->param['totalOrder'] = Products::where('status_cart', 'sudah dikeranjang')->sum('total_order');

        return view('ecommerce.co', $this->param);
    }

    public function index4()
    {
        $this->param['getInvest'] = \DB::table('invest_details')
        ->select('investations.invest_name', 'investations.images', 'investations.price', 'users.name', 'invest_details.status_payment', 'invest_details.status_wd', 'invest_details.investation_id', 'invest_details.user_id')
        ->join('investations', 'invest_details.investation_id', 'investations.id')
        ->join('users', 'invest_details.user_id', 'users.id')
        ->where('status_payment', '=', 'belum dibayar')
        ->get();

        $this->param['totalPrice'] = \DB::table('invest_details')
        ->select('investations.invest_name', 'investations.images', 'investations.price', 'users.name', 'invest_details.status_payment', 'invest_details.status_wd', 'invest_details.investation_id', 'invest_details.user_id')
        ->join('investations', 'invest_details.investation_id', 'investations.id')
        ->join('users', 'invest_details.user_id', 'users.id')
        ->where('status_payment', '=', 'belum dibayar')
        ->sum('price');

        return view('ecommerce.wishlist', $this->param);
    }

    public function dompet()
    {
        $this->param['getDompet'] = \DB::table('invest_details')
        ->select('investations.invest_name', 'investations.images', 'investations.price', 'investations.id', 'investations.description', 'users.name', 'invest_details.status_payment', 'invest_details.status_wd', 'invest_details.investation_id', 'invest_details.user_id', 'invest_details.id')
        ->join('investations', 'invest_details.investation_id', 'investations.id')
        ->join('users', 'invest_details.user_id', 'users.id')
        ->where('status_wd', '=', 'belum wd')
        ->get();

        $this->param['getDetailDompet'] = \DB::table('invest_details')
        ->select('investations.invest_name', 'investations.images', 'investations.price', 'investations.id', 'investations.description', 'invest_details.status_wd', 'invest_details.investation_id', 'invest_details.user_id', 'invest_details.id')
        ->join('investations', 'invest_details.investation_id', 'investations.id')
        ->join('users', 'invest_details.user_id', 'users.id')
        ->first();

        $this->param['totalPrice'] = \DB::table('invest_details')
        ->select('investations.invest_name', 'investations.images', 'investations.price', 'users.name', 'invest_details.status_payment', 'invest_details.status_wd', 'invest_details.investation_id', 'invest_details.user_id')
        ->join('investations', 'invest_details.investation_id', 'investations.id')
        ->join('users', 'invest_details.user_id', 'users.id')
        ->where('status_wd', '=', 'belum wd')
        ->sum('price');

        return view('hygrovest.cart', $this->param);
    }

    public function checkout(Request $request)
    {

        $user = $request->all();
    
        foreach ($request->input('orders', []) as $item => $value) {
            Orders::create([
                'product_id' => $value['product_id'],
                'user_id' => $value['user_id'],
                'status_payment' => $value['status_payment'],
                'date_order' => $value['date_order'],
            ]);
        }

        
        return redirect()->back()->with('success', 'berhasil checkout product');
    }

    public function payment()
    
    {
        $user = $request->all();
    
        foreach ($request->input('orders', []) as $item => $value) {
            Orders::update([
                'date_order' => $value['date_order'],
            ]);
        }

        
        return redirect()->back()->with('success', 'berhasil checkout product');
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
        //
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
        //
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

    public function cart()
    {
        
        return view('hygmart', $this->param);
    }

    public function addToCart(Request $request, $id)
    {
        $total_order = $request->total_order;
        Products::where('id', $request->id)->update([
            'status_cart'=>'sudah dikeranjang',
            'total_order' => $request->total_order,
            'total_price' => $request->price * $total_order,          
        ]);
        return redirect()->back()->with('success', 'berhasil masukkan ke keranjang');
    }

    public function dompetInvest(Request $request, $id)
    {
        InvestDetails::where('id', $request->id)->update([
            'status_wd'=> "sudah wd",
        ]);
        return redirect()->back()->with('success', 'berhasil wd gess ');
    }

    public function addToInvestDetail(Request $request, $id)
    {
        InvestDetails::create([
            'investation_id' => $request->investation_id,
            'user_id' => $request->user_id,          
            'status_payment'=> $request->status_payment,
            'status_wd'=> $request->status_wd,
        ]);
        return redirect()->back()->with('success', 'berhasil memilih invest');
    }
}
