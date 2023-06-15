<?php

namespace App\Http\Controllers;
use App\Models\Investations;
use App\Models\Partners;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
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
        $this->param['getInvest'] = Investations::all();
        return view('mitraMain.investm.index', $this->param); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mitraMain.investm.form'); 
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

            return redirect('/investm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->param['getDetailInvest'] = Investations::find($id);
        return view('mitraMain.investm.edit', $this->param);
    }

    public function edit($id)
    {
        //
    }

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

        return redirect('/investm');
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
        return redirect('/investm');
    }

    public function dataInvestm(){
        $invest = \DB::table('investations')
                        ->select('investations.id', 'investations.invest_name', 'investations.images', 'investations.price', 'investations.stock', 'investations.profit', 'investations.contract', 'investations.description')
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
            $row[] = $list->profit;
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
