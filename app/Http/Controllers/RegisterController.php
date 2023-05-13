<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Events\Registered;

use App\Models\User;
use App\Models\Customers;

use Str;

class RegisterController extends Controller
{
    public function create(Request $request){
        //dd($request);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'required_with:confirm', 'same:confirm'],
            'confirm' => ['required'],
            'date_of_birth' => ['required']
        ]);    

        $customer = new User();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->email_verified_at=now();
        $customer->password=bcrypt($request->password);
        $customer->remember_token=Str::random(60);
        $customer->save();

        event(new Registered($customer));
        $customer->assignRole('customer');

        $customer_detail=new Customers();
        $customer_detail->code_customer ='CST_001';
        $customer_detail->address = $request->address;
        $customer_detail->phone_number = $request->phone_number;
        $customer_detail->date_of_birth = $request->date_of_birth;
        $customer_detail->user_id = $customer->id;
        $customer_detail->save();

        return redirect('/login');
    }
}
