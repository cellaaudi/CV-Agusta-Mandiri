<?php

use App\Http\Controllers\AdvertisingCartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarBuyController;
use App\Http\Controllers\CarCategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndonesiaController;
use App\Http\Controllers\PropertyCategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
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

// Route Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Route for Admin only
    Route::middleware("can:admin")->prefix('admin')->name('admin.')->group(function () {
        Route::get('/home', function () {
            return view('admin.index');
        })->name('home');

        Route::resource('/advertising', AdvertisingController::class);
        Route::prefix('car')->name('car.')->group(function () {
            Route::resource('/sell', CarController::class);
            Route::resource('/buy', CarBuyController::class);
            Route::resource('/brand', CarBrandController::class);
            Route::resource('/category', CarCategoryController::class);
        });
        Route::resource('/property', PropertyController::class);
    });

    // Route for Customer Only
    Route::name('customer.')->group(function () {
        Route::middleware("can:customer")->group(function () {
            //keranjang
            // kalo mau tambah ke keranjang langsung alert suruh login
            Route::prefix('cart')->name('cart.')->group(function () {
                Route::resource('/advertising', AdvertisingCartController::class);
            });
            // Route::get('/cart/advertising/{id}', [CartController::class, 'showAdvertising'])->name('adv.cart');
            // Route::post('/cart/advertising/add', [CartController::class, 'addAdvertising'])->name('adv.cart.add');

            Route::resource('/profile', UserController::class);
        });
    });
});

// Route for Guest and All
Route::name('customer.')->group(function () {
    Route::get('/home', function () {
        return view('index');
    })->name('home');
    Route::get('/about', function () {
        return view('customer.about');
    })->name('about');
    Route::get('/advertising', [CustomerController::class, 'advs'])->name('advertising');
    Route::get('/advertising/detail/{adv}', [CustomerController::class, 'adv_detail'])->name('advertising.detail');
    Route::get('/car', [CustomerController::class, 'cars'])->name('car');
    Route::get('/car/detail/{adv}', [CustomerController::class, 'car_detail'])->name('car.detail');
    Route::get('/property', [CustomerController::class, 'props'])->name('property');
    Route::get('/property/detail/{adv}', [CustomerController::class, 'prop_detail'])->name('property.detail');
});

// Route for Indonesia.sql
Route::get('/regency/{id}', [IndonesiaController::class, 'regencies'])->name('regency');
Route::get('/district/{id}', [IndonesiaController::class, 'districts'])->name('district');
Route::get('/village/{id}', [IndonesiaController::class, 'villages'])->name('village');