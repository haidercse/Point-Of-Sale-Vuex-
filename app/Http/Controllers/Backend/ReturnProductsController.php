<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSizeStock;
use App\Models\ReturnProduct;

class ReturnProductsController extends Controller
{
    public function returnProduct(){
        return view('backend.pages.return_product.create');
    }

    public function returnProductSubmit(Request $request){
      
        $request->validate([
            'product_id' => 'required|numeric',
            'date'       => 'required|string',
            'items'      => 'required'
        ]);

        foreach ($request->items as $item) {
            if($item['quantity'] && $item['quantity'] > 0 ){
                $newItem = new ReturnProduct();
                $newItem->product_id = $request->product_id;
                $newItem->date = $request->date;
                $newItem->size_id = $item['size_id'];
                $newItem->quantity = $item['quantity'];
                $newItem->save();

                $productSizeQuantity = ProductSizeStock::where('product_id', $request->product_id)
                                        ->where('size_id', $item['size_id'])
                                        ->first();

                  //increase quantity
                    $productSizeQuantity->quantity += $item['quantity'];
               
                
                $productSizeQuantity->save();
            }

            return response()->json([
                'success' => true,
            ]);
           
        }
    }

    public function returnProductHistory(){
        $return_products = ReturnProduct::with(['product','size'])->orderBy('created_at','desc')->get();
        return view('backend.pages.return_product.history',compact('return_products'));
    }
}
