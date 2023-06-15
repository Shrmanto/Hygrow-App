<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//base
Auth::routes();
Route::get('/redirect', [App\Http\Controllers\RedirectController::class, 'redirect']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin-dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/mitra-dashboard', [App\Http\Controllers\HomeController::class, 'dashboardMitra'])->name('dashboard.mitra');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::post('/register-user', [App\Http\Controllers\RegisterController::class, 'create']);
        

//dashboard admin
Route::get('/admin/data', [App\Http\Controllers\AdminController::class, 'dataAdmin'])->name('admin.data');
Route::resource('/admin', App\Http\Controllers\AdminController::class);

Route::get('/partners/data', [App\Http\Controllers\MitraController::class, 'dataPartner'])->name('partner.data');
Route::resource('/partners', App\Http\Controllers\MitraController::class);
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

Route::get('/orderc/data', [App\Http\Controllers\OrdercController::class, 'index'])->name('orderc.data');
Route::get('/orderc/payment/{id}', [App\Http\Controllers\OrdercController::class, 'accPayment'])->name('orderc.acc');
Route::get('/investc/data', [App\Http\Controllers\InvestcController::class, 'index'])->name('investc.data');

Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile']);
Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings']);
Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::patch('/profile/{id}', [App\Http\Controllers\UserController::class, 'editProfile'])->name('user.update');
//display
Route::get('/mitramain', [App\Http\Controllers\PartnerController::class, 'index']);
Route::get('/custmain', [App\Http\Controllers\PartnerController::class, 'index2']);
Route::get('/adminmain', [App\Http\Controllers\PartnerController::class, 'index3']);

//display ecommerce
Route::get('/hygromart', [App\Http\Controllers\HygmartController::class, 'index'])->name('hygromart');
Route::get('/showcart', [App\Http\Controllers\HygmartController::class, 'index2']);
Route::put('/cart/{id}', [App\Http\Controllers\HygmartController::class, 'addToCart']);
Route::get('/co', [App\Http\Controllers\HygmartController::class, 'index3']);
Route::post('/checkout-product', [App\Http\Controllers\HygmartController::class, 'checkout']);
Route::post('/payment-product', [App\Http\Controllers\HygmartController::class, 'payment']);
Route::get('/wishlist', [App\Http\Controllers\HygmartController::class, 'index4']);
Route::patch('/dompet-invest/{id}', [App\Http\Controllers\HygmartController::class, 'dompetInvest']);
Route::get('/get-dompet', [App\Http\Controllers\HygmartController::class, 'dompet']);
Route::get('/hygrovest', [App\Http\Controllers\HygmartController::class, 'hygrovest']);
Route::post('/get-invest/{id}', [App\Http\Controllers\HygmartController::class, 'addToInvestDetail']);

//dashboard mitra
//productm
Route::get('/productm/data', [App\Http\Controllers\ProductmController::class, 'dataProductm'])->name('productm.data');
Route::get('/productm/add', [App\Http\Controllers\ProductmController::class, 'create'])->name('productm.create');
Route::get('/productm/edit/{id}', [App\Http\Controllers\ProductmController::class, 'show'])->name('show');
Route::put('/productm/update/{id}', [App\Http\Controllers\ProductmController::class, 'update'])->name('update');
Route::get('/productm/delete/{id}', [App\Http\Controllers\ProductmController::class, 'destroy'])->name('delete');
//investm
Route::get('/investm/data', [App\Http\Controllers\InvestmController::class, 'dataInvestm'])->name('investm.data');
Route::get('/investm/add', [App\Http\Controllers\InvestmController::class, 'create'])->name('investm.create');
Route::get('/investm/edit/{id}', [App\Http\Controllers\InvestmController::class, 'show'])->name('show');
Route::put('/investm/update/{id}', [App\Http\Controllers\InvestmController::class, 'update'])->name('update');
Route::get('/investm/delete/{id}', [App\Http\Controllers\InvestmController::class, 'destroy'])->name('delete');
//recapm

Route::get('/recapm', [App\Http\Controllers\RecapmController::class, 'index']);
Route::get('/orderm', [App\Http\Controllers\OrdermController::class, 'index']);
Route::put('/recapm/acc/{id}', [App\Http\Controllers\RecapmController::class, 'acc']);
Route::resource('/productm', App\Http\Controllers\ProductmController::class);
Route::get('/investm/data', [App\Http\Controllers\InvestmController::class, 'dataInvestm'])->name('investm.data');
Route::resource('/investm', App\Http\Controllers\InvestmController::class);