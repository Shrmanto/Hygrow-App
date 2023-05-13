<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'admin1',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('Satuya'),
            'remember_token'=>Str::random(60),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        event(new Registered($admin));
        $admin->assignRole('admin');

        $mitra = User::create([
            'name'=>'mitra1',
            'email'=>'mitra@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('erhaje'),
            'remember_token'=>Str::random(60),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        event(new Registered($mitra));
        $mitra->assignRole('mitra');

        $customer = User::create([
            'name'=>'customer1',
            'email'=>'customer@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('customer'),
            'remember_token'=>Str::random(60),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        event(new Registered($customer));
        $customer->assignRole('customer');
    }
}
