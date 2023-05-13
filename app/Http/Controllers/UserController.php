<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit() {
        $user = Auth::user();
        echo json_encode($user);
    }

    public function editProfile(Request $request, $id) {
        $user = User::find($id);

        if(!empty($request->password)) {
            if(Hash::check($request->old_password, $user->password)) {
                $user->password = bcrypt($request->password);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengubah password, password lama tidak sesuai',
                    'data' => ''
                ], 500);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $data = $request->all();

        if($user->update()) {
            return response()->json([
                'success' => true,
                'message' => 'Edit Profile Berhasil',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Edit Profile Gagal',
                'data' => ''
            ], 500);
        }
    }
}
