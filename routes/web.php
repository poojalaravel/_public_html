<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\HomeController;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('admin/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    // Route::get('/dashboard', 'dashboard')->name('dashboard');

    Route::post('/logout', 'logout')->name('logout');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('productlist',[ProductController::class,'index'])->name('product.list');
    Route::get('addproduct',[ProductController::class,'create'])->name('product.add');
    Route::post('storeproduct',[ProductController::class,'store'])->name('product.store');
    Route::get('editproduct/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::delete('deleteproduct/{id}',[ProductController::class,'destroy'])->name('product.delete');
    //Account Routes
    Route::get('addaccount',[AccountController::class,'create'])->name('account.add');
    Route::get('accountlist',[AccountController::class,'index'])->name('account.list');
    Route::post('storeaccount',[AccountController::class,'store'])->name('account.store');
    Route::get('editaccount/{id}',[AccountController::class,'edit'])->name('account.edit');
    Route::delete('deleteaccount/{id}',[AccountController::class,'destroy'])->name('account.delete');
    Route::get('editbyuseraccount/{id}',[AccountController::class,'editbyuser'])->name('editbyuseraccount.byuser');
    Route::any('store_by_user', [AccountController::class,'store_by_user'])->name('store_by_user');
    Route::any('userslist', [HomeController::class,'userslist'])->name('users.list');
    Route::any('register', [HomeController::class,'register'])->name('users.register');
    Route::any('store', [HomeController::class,'store'])->name('users.store');
    Route::any('destroy/{id}', [HomeController::class,'destroy'])->name('users.destroy');
    Route::get('adduser',[AccountController::class,'adduser'])->name('user.add');
    Route::get('edituser/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::post('addproxy',[HomeController::class,'addproxy'])->name('user.addproxy');
    Route::post('addips',[HomeController::class,'addips'])->name('user.addips');
    Route::any('transaction',[HomeController::class,'transaction'])->name('user.transaction');
    Route::any('addscreenshot',[HomeController::class,'addscreenshot'])->name('user.addscreenshot');
    
    
    
    
    
});
Route::group(['middleware'=>'admin'],function(){

    // Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    // Route::get('productlist',[ProductController::class,'index'])->name('product.list');
    // Route::get('addproduct',[ProductController::class,'create'])->name('product.add');
    // Route::post('storeproduct',[ProductController::class,'store'])->name('product.store');
    // Route::get('editproduct/{id}',[ProductController::class,'edit'])->name('product.edit');
    // Route::delete('deleteproduct/{id}',[ProductController::class,'destroy'])->name('product.delete');
    // //Account Routes
    // Route::get('addaccount',[AccountController::class,'create'])->name('account.add');
    // Route::get('accountlist',[AccountController::class,'index'])->name('account.list');
    // Route::post('storeaccount',[AccountController::class,'store'])->name('account.store');
    // Route::get('editaccount/{id}',[AccountController::class,'edit'])->name('account.edit');
    // Route::delete('deleteaccount/{id}',[AccountController::class,'destroy'])->name('account.delete');
    
    
});

// Auth::routes();

Route::get('/home', [AdminController::class,'dashboard'])->name('home');
