<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investations;
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
        //
        return view('investation.index');
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
        $investation = new User; 
        // $partner->user_id = $user->id;
        $investation->name_invest = $request->name_invest;
        $investation->price = $request->price;
        $investation->profit = $request->profit;
        $investation->contract = $request->contract;
        $investation->description = $request->description;
        // $investation->customer_partner_id = $request->customer_partner_id;
        $investation->save();
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

    public function dataInvestCust(){
        $investation = \DB::table('investations')
                        ->select('investations.invest_name', 'investations.price', 'investations.profit', 'investations.contract', 'investations.description')
                        // ->join('users', 'investations.user_id', 'users.id')
                        ->get();
        $no = 0;
        $data = array();
        foreach($investation as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->name_invest;
            $row[] = $list->price;
            $row[] = $list->profit;
            $row[] = $list->contract;
            $row[] = $list->description;
            // $row[] = $list->customer_partner_id;
            $row[] =  '<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteData('.$list->id.')"><i class="fa fa-trash"></i></a>'; 
            '';
           
            $data[]= $row; 
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
}
