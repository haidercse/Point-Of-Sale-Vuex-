<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Http\Response;

class SizesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::orderBy('id','desc')->get();
        return view('backend.pages.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.size.create');
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
            'size' => 'required|unique:sizes|max:50|min:2',
        ]);

        $size = new Size();
        $size->size = $request->size;
        $size->save();
        return redirect()->route('size.index')->with('success','size  has been added successfully');
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
        $size = Size::find($id);
        return view('backend.pages.size.edit',compact('size'));
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
            'size' => 'nullable',
        ]);

        $size = Size::find($id);
        if (!is_null($request->size)) {
            $size->size = $request->size;
        }else{
            return back()->with('error','Please, Input size Name');
        }
        
        $size->save();
        return redirect()->route('size.index')->with('success','size  has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        if (!is_null($size)) {
            $size->delete();
        }else{
            return redirect()->route('size.index')->with('error','There is no size size by this ID , SORRY');
        }

        return back()->with('success','Your size has been deleted successfully');
    }

     //HANDLE AJAX
     public function getSizes(){
        $sizes = Size::all();
        return response()->json([
            'success' => true,
            'data' => $sizes,
        ],Response::HTTP_OK);
    }
}
