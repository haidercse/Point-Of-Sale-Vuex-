<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ReturnProduct;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_product = Product::count();
        $total_user = User::count();
        $total_product_stock = ProductStock::where('status',ProductStock::STOCK_IN)->count();
        $total_product_return = ReturnProduct::count();
        $recent_products = Product::latest()->take(10)->get();
        return view('home',compact('total_product','total_user','total_product_stock','total_product_return','recent_products'));
    }
}
