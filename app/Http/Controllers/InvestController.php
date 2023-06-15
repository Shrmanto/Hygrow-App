<?php

namespace App\Http\Controllers;
use App\Models\Investations;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InvestController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->param['getInvest'] = Investations::all();
        return view('invest.index', $this->param);
        
        
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

            return redirect('/invest');
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

        return redirect('/invest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function dataInvest(){
        $invest = \DB::table('investations')
                        ->select('investations.invest_name', 'investations.images', 'investations.price', 'investations.stock', 'investations.description', 'users.id', 'users.name')
                        ->join('users', 'investations.customer_partner_id', 'users.id')
                        ->get();
        $no = 0;
        $data = array();
        foreach($invest as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->invest_name;
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
