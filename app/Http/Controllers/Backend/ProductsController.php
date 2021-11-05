<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSizeStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::with(['category','brand'])->get();
        return view('backend.pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'name' => 'required|unique:products|max:50|min:2',
            'year' => 'required',
            'image' =>'required|image|mimes:jpeg,jpg,png,|max:1024',
            'description' => 'required|max:200',
            'sku' => 'required|string|max:100','unique:products',
            'status' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'retail_price' => 'required|numeric',
           
        ]);

        $product = new Product();
        $product->user_id = Auth::id();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->year = $request->year;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->status = $request->status;
        $product->cost_price = $request->cost_price;
        $product->retail_price = $request->retail_price;
        //insert image
        if ($request->has('image')) {
            $image = $request->file('image');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('images/products/');
            $image->move($dest, $reImage);

            // save in database
            $product->image = $reImage;

        }
         $product->save();

        //store products size stock
        if ($request->items) {
            foreach (json_decode($request->items) as $item) {
                $size_stock = new ProductSizeStock();
                $size_stock->product_id = $product->id;
                $size_stock->size_id = $item->size_id;
                $size_stock->location = $item->location;
                $size_stock->quantity = $item->quantity;
                $size_stock->save();
            }
        }
       // flash('products insert successfully!')->success();
        return response()->json([
            'success' => true,
        ]);

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['category','brand','product_stocks.size'])->where('id',$id)->first();
        return view('backend.pages.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::where('id',$id)->with(['product_stocks'])->first();
        return view('backend.pages.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'name' => 'required|max:50|min:2|unique:products,name,'.$id,
            'year' => 'required',
            'image' =>'nullable',
            'description' => 'required|max:200',
            'sku' => 'required|string|max:100','unique:products,sku,' .$id,
            'status' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'retail_price' => 'required|numeric',
           
        ]);

        $product = Product::find($id);
        $product->user_id = Auth::id();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->year = $request->year;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->status = $request->status;
        $product->cost_price = $request->cost_price;
        $product->retail_price = $request->retail_price;
        //insert image
        if ($request->hasFile('image')) {
            //deleted Old Images
            if(File::exists('images/products/'.$product->image)){
                File::delete('images/products/'.$product->image);
            }
            $image = $request->image;
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('images/products/');
            $image->move($dest, $reImage);

            // save in database
            $product->image = $reImage;

        }
         $product->save();
         
         //delete old stocks
         ProductSizeStock::where('product_id',$id)->delete();
        //store products size stock
        if ($request->items) {
            foreach (json_decode($request->items) as $item) {
                $size_stock = new ProductSizeStock();
                $size_stock->product_id = $product->id;
                $size_stock->size_id = $item->size_id;
                $size_stock->location = $item->location;
                $size_stock->quantity = $item->quantity;
                $size_stock->save();
            }
        }
      

        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            $product->delete();
        }else{
            return redirect()->route('product.index')->with('error','There is no product name by this ID , SORRY');
        }

        return back()->with('success','Your product has been deleted successfully');
    }

    //HANDLE AJAX
    public function getProducts(){
    $products = Product::with(['product_stocks.size'])->get();
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}
