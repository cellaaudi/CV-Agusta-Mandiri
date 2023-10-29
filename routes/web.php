<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\CarBuyController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware("can:admin")->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', function () {
        return view('admin.index');
    })->name('home');
    Route::resource('/advertising', AdvertisingController::class);
    Route::resource('/car', CarController::class);
    Route::resource('/buy-car', CarBuyController::class);
    Route::resource('/property', PropertyController::class);
});

Route::name('customer.')->group(function () {
    Route::get('/home', function () {
        return view('index');
    })->name('home');
    Route::get('/about', function () {
        return view('customer.about');
    })->name('about');
    Route::get('/advertising', [CustomerController::class, 'advs'])->name('advertising');
    Route::post('/advertising/detail/{adv}', [CustomerController::class, 'adv_detail'])->name('advertising.detail');
    Route::get('/car', [CustomerController::class, 'cars'])->name('car');
    Route::get('/property', [CustomerController::class, 'props'])->name('property');

    Route::middleware("can:customer")->group(function () {
        //keranjang
        // kalo mau tambah ke keranjang langsung alert suruh login
    });
});
