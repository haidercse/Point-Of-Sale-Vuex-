<?php

use Illuminate\Support\Facades\Route;
//dashboard controller 
use App\Http\Controllers\Dashboard\DashboardController;
//category controller

use App\Http\Controllers\Backend\{
    CategoriesController,
    BrandsController,
    SizesController,
    ProductsController,
    ReturnProductsController,
    StocksController,
    UsersController
};

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

Route::get('/', function () {
    return redirect('/login');
});

 Route::group(['prefix'=>'dashboard'], function(){
     Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
     
     //USER
     Route::resource('user', UsersController::class);

     //LOGOUT USER
     Route::get('/logout',[UsersController::class,'logout'])->name('user.logout');
     
     //CATEGORY
     Route::resource('category', CategoriesController::class);
     
     //CATEGORY API
     Route::get('/api/categories',[CategoriesController::class,'getCategories']);

     //BRAND
     Route::resource('brand', BrandsController::class);
     
     //BRAND API
     Route::get('/api/brands',[BrandsController::class,'getBrands']);

     //SIZE
     Route::resource('size', SizesController::class);

     //SIZE API
     Route::get('/api/sizes',[SizesController::class,'getSizes']);

     //PRODUCTS
     Route::resource('product', ProductsController::class);

     //PRODUCT API
     Route::get('/api/products',[ProductsController::class,'getProducts']);

     //STOCKS
     Route::get('stocks',[StocksController::class,'stockIn'])->name('product.stock.in');
     Route::post('stocks',[StocksController::class,'stockSubmit'])->name('product.stock.submit');
     Route::get('stocks/history',[StocksController::class,'stockHistory'])->name('product.stock.history');

    //RETURN PRODUCTS
     Route::get('return-product',[ReturnProductsController::class,'returnProduct'])->name('return.product');
     Route::post('return-product',[ReturnProductsController::class,'returnProductSubmit'])->name('return.product.submit');
     Route::get('return-product/history',[ReturnProductsController::class,'returnProductHistory'])->name('return.product.history');

 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
