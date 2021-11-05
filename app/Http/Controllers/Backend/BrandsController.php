<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Http\Response;

class BrandsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
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
            'name' => 'required|unique:brands|max:50|min:2',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brand.index')->with('success','brand  has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.pages.brand.edit',compact('brand'));
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
        $request->validate([
            'name' => 'nullable',
        ]);

        $brand = Brand::find($id);
        if (!is_null($request->name)) {
            $brand->name = $request->name;
        }else{
            return back()->with('error','Please, Input brand Name');
        }
        
        $brand->save();
        return redirect()->route('brand.index')->with('success','brand  has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {
            $brand->delete();
        }else{
            return redirect()->route('brand.index')->with('error','There is no brand name by this ID , SORRY');
        }

        return back()->with('success','Your brand has been deleted successfully');
    }

    //HANDLE AJAX
    public function getBrands(){
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'data' => $brands,
        ],Response::HTTP_OK);
    }
}
