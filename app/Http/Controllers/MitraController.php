<?php

namespace App\Http\Controllers;
use App\Models\Partners;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partners.index');
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
        $user = new User; 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        event(new Registered($user));
        $user->assignRole('mitra');
        
        if($user->save()){
            $partner = new Partners;
            $partner->code_partners = random_int(100, 9999);
            $partner->user_id = $user->id;
            $partner->address = $request->address;
            $partner->phone_number = $request->phone_number;
            $partner->save();
        }
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete from table users
        $user = User::find($id);
        $user->delete();        
    }

    public function dataPartner(){
        $partner = DB::table('partners')
                        ->select('users.id', 'users.name', 'users.email', 'partners.address', 'partners.phone_number')
                        ->join('users', 'partners.user_id', 'users.id')
                        ->get();
        $no = 0;
        $data = array();
        foreach($partner as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->name;
            $row[] = $list->email;
            $row[] = $list->address;
            $row[] = $list->phone_number;
            $row[] =  '<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteData('.$list->id.')"><i class="far fa-trash-alt" style="color: #ffffff;"></i></a>';
            $data[]= $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
}
