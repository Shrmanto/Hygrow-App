<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\HyGmartController;

Route::get('/', function () {
    return view('welcome');
});

//base
Auth::routes();
Route::get('/redirect', [App\Http\Controllers\RedirectController::class, 'redirect']);
Route::get('/Admhome', [App\Http\Controllers\HomeController::class, 'index'])->name('Admhome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index1'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/Custhome', [App\Http\Controllers\HomeController::class, 'index2'])->name('Custhome');
Route::get('/Custabout', [App\Http\Controllers\HomeController::class, 'about2'])->name('Custabout');
Route::get('/hygromart', [HyGmartController::class, 'index'])->name('hygromart');
Route::post('/register-user', [App\Http\Controllers\RegisterController::class, 'create']);

//dashboard admin
Route::get('/admin/data', [App\Http\Controllers\AdminController::class, 'dataAdmin'])->name('admin.data');
Route::resource('/admin', App\Http\Controllers\AdminController::class);
Route::get('/partners/data', [App\Http\Controllers\MitraController::class, 'dataPartner'])->name('partner.data');
Route::resource('partners', MitraController::class);

Route::resource('/partners', App\Http\Controllers\MitraController::class);
Route::get('/customer/data', [App\Http\Controllers\CustomerController::class, 'dataCust'])->name('customer.data');
Route::resource('/customer', App\Http\Controllers\CustomerController::class);
Route::get('/product/data', [App\Http\Controllers\ProductController::class, 'dataProduct'])->name('product.data');
Route::resource('/product', App\Http\Controllers\ProductController::class);
Route::get('/invest/data', [App\Http\Controllers\InvestController::class, 'dataInvest'])->name('invest.data');
Route::resource('/invest', App\Http\Controllers\InvestController::class);
Route::get('/complaint/data', [App\Http\Controllers\ComplaintsController::class, 'dataComplaint'])->name('complaint.data');
Route::post('/complaint/send', [App\Http\Controllers\ComplaintsController::class, 'store']);
Route::resource('/complaint', App\Http\Controllers\ComplaintsController::class);
Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile']);
Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings']);
Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::patch('/profile/{id}', [App\Http\Controllers\UserController::class, 'editProfile'])->name('user.update');
//display
Route::get('/mitramain', [App\Http\Controllers\PartnerController::class, 'index']);
Route::get('/custmain', [App\Http\Controllers\PartnerController::class, 'index2']);
Route::get('/adminmain', [App\Http\Controllers\PartnerController::class, 'index3']);
//dashboard mitra
Route::get('/productm/data', [App\Http\Controllers\ProductmController::class, 'dataProductm'])->name('productm.data');
Route::resource('/productm', App\Http\Controllers\ProductmController::class);
Route::get('/investm/data', [App\Http\Controllers\InvestmController::class, 'dataInvestm'])->name('investm.data');
Route::resource('/investm', App\Http\Controllers\InvestmController::class);