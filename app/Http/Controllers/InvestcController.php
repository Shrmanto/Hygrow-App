<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->param['getInvest'] = \DB::table('invest_details')
        ->select('investations.invest_name', 'investations.images', 'investations.price', 'users.name','invest_details.id')
        ->join('investations', 'invest_details.investation_id', 'investations.id')
        ->join('users', 'invest_details.user_id', 'users.id')
        ->get();
        return view('investc.index', $this->param);
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
            $invest = new Investations;
            $request->validate([
                'images'=>'required|mimes:jpg,jpeg,png|max:5000',
            ]);
    
            $image = $request->file('images');
            $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            $request->images->move(public_path('uploads'), $fileName);
            $img_url = 'uploads/' . $fileName;
    
            $invest->invest_name = $request->invest_name;
            $invest->images = $img_url;
            $invest->price = $request->price;
            $invest->stock = $request->stock;
            $invest->profit = $request->profit;
            $invest->contract = $request->contract;
            $invest->description = $request->description;

            $invest->customer_partner_id = $request->customer_partner_id;
            $invest->save();

            return redirect('/investc');
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
        $invest = Investations::find($id);
        $request->validate([
            'images'=>'required|mimes:jpg,jpeg,png|max:5000',
        ]);

        $image = $request->file('images');
        $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $request->images->move(public_path('uploads'), $fileName);
        $img_url = 'uploads/' . $fileName;

        $invest->invest_name = $request->invest_name;
        $invest->images = $img_url;
        $invest->price = $request->price;
        $invest->stock = $request->stock;
        $invest->description = $request->description;

        $invest->customer_partner_id = $request->customer_partner_id;
        $invest->update();

        return redirect('/investc');
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
