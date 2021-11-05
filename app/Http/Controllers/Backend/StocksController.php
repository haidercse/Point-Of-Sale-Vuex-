<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSizeStock;
use App\Models\ProductStock;

class StocksController extends Controller
{
    public function stockIn(){
        return view('backend.pages.stocks.create');
    }

    public function stockSubmit(Request $request){
        $request->validate([
            'product_id' => 'required|numeric',
            'date'       => 'required|string',
            'stock_type' => 'required|string',
            'items'      => 'required'
        ]);

        foreach ($request->items as $item) {
            if($item['quantity'] && $item['quantity'] > 0 ){
                $newItem = new ProductStock();
                $newItem->product_id = $request->product_id;
                $newItem->date = $request->date;
                $newItem->status = $request->stock_type;
                $newItem->size_id = $item['size_id'];
                $newItem->quantity = $item['quantity'];
                $newItem->save();

                $productSizeQuantity = ProductSizeStock::where('product_id', $request->product_id)
                                        ->where('size_id', $item['size_id'])
                                        ->first();

                if ($request->stock_type == ProductStock::STOCK_IN) {
                    //increase quantity
                    $productSizeQuantity->quantity += $item['quantity'];
                }else{
                    $productSizeQuantity->quantity -= $item['quantity'];
                }  
                
                $productSizeQuantity->save();
            }

            return response()->json([
                'success' => true,
            ]);
           
        }
    }

    public function stockHistory(){
        $stocks = ProductStock::with(['product','size'])->orderBy('created_at','desc')->get();
        return view('backend.pages.stocks.history',compact('stocks'));
    }
}
