<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('complaint.index');
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
        $complaint = new Complaint;
        $complaint->user_id = auth()->user()->id;
        $complaint->isi = $request->isi;
        $complaint->save();
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
        /*$complaint = User::find($id);
        echo json_encode($complaint);*/
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
        $complaint = Complaint::find($id);
        $complaint->isi = $request->message;
        $complaint->update_at = now();
        $complaint->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::find($id);
        $complaint->delete();
    }

    public function dataComplaint()
    {
        $complaint = DB::table('complaints')
            ->select('users.id', 'users.name', 'users.email', 'complaints.isi')
            ->join('users', 'complaints.user_id', 'users.id')
            ->get();
        $no = 0;
        $data = array();
        foreach ($complaint as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->name;
            $row[] = $list->email;
            $row[] = $list->isi;
            // $row[] =  '<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteData(' . $list->id . ')"><i class="fa fa-trash"></i></a>';
            '';

            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
}
