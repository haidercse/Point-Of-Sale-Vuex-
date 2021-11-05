<?php

use Illuminate\Support\Facades\Route;
//dashboard controller 
use App\Http\Controllers\Dashboard\DashboardController;
//category controller
use App\Http\Controllers\Backend\CategoriesController;
//brands controller 
use App\Http\Controllers\Backend\BrandsController;
//sizes controller 
use App\Http\Controllers\Backend\SizesController;
//products controller
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\StocksController;
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
    return view('welcome');
});

 Route::group(['prefix'=>'dashboard'], function(){
     Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

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

 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
