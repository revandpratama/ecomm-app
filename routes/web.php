<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request as IlluRequest;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Validation\ValidatesRequests;

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
    return view('index', [
        'products' => Product::latest('created_at')->take(3)->get()
    ]);
});

// ! User login and registreation
Route::get('/login', [LoginController::class, 'index'])
->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])
->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])
->middleware('guest');

// ! Cart
Route::get('/cart', [CartController::class, 'index'])
->middleware('auth')->name('cart');

Route::put('/cart',  [CartController::class, 'edit'])
->middleware('auth');

Route::delete('/cart', [CartController::class, 'destroy'])
->middleware('auth');


// ! Account
Route::get('/account/{user}', [AccountController::class, 'show'])
->middleware('auth');

Route::put('account/{user:username}', [AccountController::class, 'edit'])
->middleware('auth');

// ! Product
Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::post('/product', [ProductController::class, 'store'])
->middleware('auth');

Route::post('/pay', function(IlluRequest $request){
    dd($request);
});


Route::get('/add', function () {
    return view('addProduct');
});