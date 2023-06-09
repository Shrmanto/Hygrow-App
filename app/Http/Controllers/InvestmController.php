<?php

namespace App\Http\Controllers;
use App\Models\Investations;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InvestmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mitraMain.investm.index'); 
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
        $invest->invest_name = $request->invest_name;
        $invest->images = $request->images;
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('image')->store('image', 'public');

        $data = Image::create([
            'image' => $image_path,
        ]);
        $invest->profit = $request->profit;
        $invest->price = $request->price;
        $invest->contract = $request->contract;
        $invest->description = $request->description;
        $invest->customer_partner_id = $request->customer_partner_id;
        $invest->save();
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
        $invest->invest_name = $request->invest_name;
        $invest->images = $request->images;
        $invest->price = $request->price;
        $invest->profit = $request->profit;
        $invest->contract = $request->contract;
        $invest->description = $request->description;
        $invest->update_at = now();
        $invest->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invest = Investations::find($id);
        $invest->delete();
    }

    public function dataInvestm(){
        $invest = \DB::table('investations')
                        ->select('investations.id', 'investations.invest_name', 'investations.images', 'investations.price', 'investations.profit', 'investations.contract', 'investations.description')
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
            $row[] = $list->profit;
            $row[] = $list->contract;
            $row[] = $list->contract;
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
