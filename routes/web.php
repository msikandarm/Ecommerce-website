<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
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
   //user routes.................................................................................................
    Route::get('/', [App\Http\Controllers\ProductController::class,'index'])->name('index');
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/viewproducts', [App\Http\Controllers\ProductController::class,'viewproducts'])->name('product.view');
    Route::get('/addproduct', [App\Http\Controllers\ProductController::class,'addproduct'])->name('add.product');
    Route::post('/added', [App\Http\Controllers\ProductController::class,'store'])->name('added');
    Route::get('/Editproduct/{id}', [App\Http\Controllers\ProductController::class,'editproduct'])->name('edit.product');
    Route::patch('/Updateproduct/{id}', [App\Http\Controllers\ProductController::class,'updateproduct'])->name('update.product');
    Route::delete('deleteproduct/{id}', [App\Http\Controllers\ProductController::class,'destroy'])->name('delete.product');
    Route::get('/signin', [App\Http\Controllers\ProductController::class, 'register'])->name('auth.signin');
    Route::post('/addtocart',[ App\Http\Controllers\ProductController::class, 'addtocart'])->name('product.store');
    Route::get('/removecart/{id}',[ App\Http\Controllers\ProductController::class, 'removecart']);
    Route::get('/totalProduct', [App\Http\Controllers\ProductController::class, 'ShowtotalProduct'])->name('total.products');
    Route::post('update.cart', [App\Http\Controllers\ProductController::class,'updatecart']);
    Route::get('/proceedtocheckout', [App\Http\Controllers\ProductController::class, 'proceedcheckout'])->name('checkout');
    Route::get('/removecartproduct/{id}',[ App\Http\Controllers\ProductController::class, 'removecartproduct']);
    Route::get('/checkout/credit',[ App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout.credit');
    Route::post('checkout',[ App\Http\Controllers\CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');
//admin Routes.............................................................................................................
Route::group(['prefix'=>'admin'], function(){
    // Route ::get('/',[ App\Http\Controllers\admin\ProductsController::class, 'index'])->name('posts');
    Route::get('/dashbord', [ App\Http\Controllers\admin\ProductsController::class, 'admin'])->name('welcome');
    Route::get('/create', function () { return view('admin/layouts/create');})->name('admin.layouts.create');
    Route::get('/view', [ App\Http\Controllers\admin\ProductsController::class, 'views'])->name('layouts.view');
    Route::post('/added',[ App\Http\Controllers\admin\ProductsController::class, 'store'])->name('added');
    Auth::routes();
    Route::get('/', [App\Http\Controllers\admin\ProductsController::class, 'admin'])->name('welcome');
    Route::get('/post/{id}', [ App\Http\Controllers\admin\ProductsController::class, 'postview'])->name('layouts.postviews');
    Route::get('/profile/{id}', [ App\Http\Controllers\admin\ProductsController::class, 'viewprofile'])->name('layouts.profile');
    Route::get('/edit/{id}', [ App\Http\Controllers\admin\ProductsController::class, 'edit'])->name('layouts.edit');
    Route::patch('/update/{id}',[ App\Http\Controllers\admin\ProductsController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}',[ App\Http\Controllers\admin\ProductsController::class, 'destroy'])->name('blog.destroy');
    Route::get('/vieworders',[ App\Http\Controllers\admin\ProductsController::class, 'vieworders'])->name('admin.vieworders');
    Route::get('/register',[ App\Http\Controllers\admin\ProductsController::class, 'register'])->name('layouts.register');


});
