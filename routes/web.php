<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProductsController;
use GuzzleHttp\Psr7\Request;

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
    return view('welcome');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
// Route::get('things', function(){
//     return view('testing');
// });

Route::get('login/{locale}', [LocalizationController::class, 'index']);
Route::get('/list-products', [ProductsController::class, 'listfurniture'])->name('list-products');
Route::post('/update/{id}', [ProductsController::class, 'updatedata'])->name('update-products');
Route::delete('/delete/{id}', [ProductsController::class, 'deletedata'])->name('delete-products');
Route::post('/create', [ProductsController::class, 'createdata'])->name('create-products');

Route::get('/list-categories', [ProductsController::class, 'listcategories'])->name('list-categories');
Route::post('/update-categories/{id}', [ProductsController::class, 'updatecategories'])->name('update-categories');
Route::post('/create-categories', [ProductsController::class, 'createcategories'])->name('create-categories');
Route::delete('/delete-categories/{id}', [ProductsController::class, 'deletecategories'])->name('delete-categories');


Route::get('/products/{category:slug}', [ProductsController::class, 'content'])->name('showproducts');
Route::get('/item/{item:slug}', [ProductsController::class, 'detail'])->name('showdetail');
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [ProductsController::class, 'addtocart'])->name('addtocart');
Route::patch('/update-cart', [ProductsController::class, 'updatecart'])->name('update.cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove.from.cart');
Route::get('/checkout', [ProductsController::class, 'checkout'])->name('checkout');