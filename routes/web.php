<?php

use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/login2', function () {
    return view('login');
});
Route::get('/register2', function () {
    return view('register');
});
// Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'create']);

// Route::resource('/register', RegisterController::class);

// ADMIN (prefix + name bisa digabung sama middleware group nantinya)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dash', function () {
        return view('admin.index');
    });
    Route::resource('/advertising', AdvertisingController::class);
    Route::resource('/car', CarController::class);
    Route::resource('/property', PropertyController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::middleware("can:admin")->group(function(){
        // nanti route admin masuk sini
        Route::get('/homeadmin', function () {
            return view('admin.index');
        })->name("admin.home");
    });

    Route::middleware("can:customer")->group(function () {
        // route customer
    });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
