<?php

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
        'products' => Product::latest('created_at')->take(2)->get()
    ]);
});

// ! User login and registreation
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// ! Cart
Route::get('/cart', function () {
    return view('cart', [
        'cart_items' => Cart::where('user_id', '=', auth()->user()->id)->get()
    ]);
})->middleware('auth')->name('cart');

Route::put('/cart',  function (IlluRequest $request) {

    $id = $request->input('id');
    $status = $request->input('status');
    
    if($status == "inc"){
        Cart::find($id)->increment('quantity');
    }else{
        Cart::find($id)->decrement('quantity');
    }
});

Route::delete('/cart', function (IlluRequest $request){

   Cart::destroy($request->id);
   
});


// ! Account
Route::get('/account/{user}', function () {
    return view('account.index', [
        'user' => auth()->user()
    ]);
})->middleware('auth');



Route::put('account/{user:username}', function (IlluRequest $request, User $username) {
    $validatedData = $request->validate([
        'name' => 'required|min:4|max:255',
        'username' => 'required|unique:users|min:4',
        'email' => 'required|email:dns'
    ]);


    User::where('username', auth()->user()->username)->update($validatedData);

    return redirect('/account/' . auth()->user()->username)->with('success', 'Account updated');
})->middleware('auth');


Route::get('/product/{product:slug}', [ProductController::class, 'show']);