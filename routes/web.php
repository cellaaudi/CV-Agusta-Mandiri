<?php

use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarController;
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

Route::get('/', function() {
    // return redirect()->route('home');
    return view('index');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::middleware("can:admin")->prefix('admin')->name('admin.')->group(function () {
        Route::get('/home', function () {
            return view('admin.index');
        });
        Route::resource('/advertising', AdvertisingController::class);
        Route::resource('/car', CarController::class);
        Route::resource('/property', PropertyController::class);
    });

    Route::middleware("can:customer")->prefix('customer')->name('customer.')->group(function () {
        Route::get('/home', function () {
            return view('index');
        });
    });
});
