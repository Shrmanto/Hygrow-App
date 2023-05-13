<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/redirect', [App\Http\Controllers\RedirectController::class, 'redirect']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::post('/register-user', [App\Http\Controllers\RegisterController::class, 'create']);
Route::get('/admin/data', [App\Http\Controllers\AdminController::class, 'dataAdmin'])->name('admin.data');
Route::resource('/admin', App\Http\Controllers\AdminController::class);
Route::get('/partners/data', [App\Http\Controllers\MitraController::class, 'dataPartner'])->name('partner.data');
Route::post('/partners', [App\Http\Controllers\MitraController::class, 'store']);

Route::resource('/partners', App\Http\Controllers\MitraController::class);
Route::get('/customer/data', [App\Http\Controllers\CustomerController::class, 'dataCust'])->name('customer.data');
Route::resource('/customer', App\Http\Controllers\CustomerController::class);
Route::get('/complaint/data', [App\Http\Controllers\ComplaintsController::class, 'dataComplaint'])->name('complaint.data');
Route::post('/complaint/send', [App\Http\Controllers\ComplaintsController::class, 'store']);
Route::resource('/complaint', App\Http\Controllers\ComplaintsController::class);
Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile']);
Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings']);
Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::patch('/profile/{id}', [App\Http\Controllers\UserController::class, 'editProfile'])->name('user.update');

Route::get('/mitramain', [App\Http\Controllers\PartnerController::class, 'index']);
Route::get('/custmain', [App\Http\Controllers\PartnerController::class, 'index2']);
Route::get('/adminmain', [App\Http\Controllers\PartnerController::class, 'index3']);

Route::post('/partner/delete/{id}', [App\Http\Controllers\MitraController::class, 'destroy'])->name('partner.delete');
