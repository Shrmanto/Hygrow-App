<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *m
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
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
        $customer = new User;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->assignRole('customer');
        if ($customer->save()) {
            $customer = new Customers();
            $customer->user_id = $customer->id;
            $customer->address = $request->address;
            $customer->phone_number = $request->phone_number;
            $customer->date_of_birth = $request->date_of_birth;
            $customer->save();
            return redirect()->route('login')->with('success', 'Success Register');
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
        $customer = User::find($id);
        $customer->delete();
    }

    public function dataCust()
    {
        $customer = DB::table('customers')
            ->select('users.id', 'users.name', 'users.email', 'customers.address', 'customers.phone_number')
            ->join('users', 'customers.user_id', 'users.id')
            ->get();
        $no = 0;
        $data = array();
        foreach ($customer as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->name;
            $row[] = $list->email;
            $row[] = $list->address;
            $row[] = $list->phone_number;
            '';

            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
}
