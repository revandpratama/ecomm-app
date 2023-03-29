<?php

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as IlluRequest;
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
        'products' => Product::latest('created_at')->take(2)->get()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/cart', function(){
    return view('cart', [
        'cart_items' => Cart::where('user_id' , '=' , auth()->user()->id)->get()
    ]);

})->middleware('auth');

Route::get('/account/{user}', function(){
    return view('account.index', [
        'user' => auth()->user()
    ]);
})->middleware('auth');

Route::resource('/account', AccountController::class);