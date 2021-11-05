
@extends('backend.layouts.master')

@section('title')
   Update Category Form | Point of Sale
@endsection

@section('admin-content')
     <div class="container">
         <div class="row">
             <div class="col-md-10">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Update Category Form</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                        <a href="{{ route('category.index') }}" class=" btn btn-warning"><i class="fas fa-long-arrow-alt-right"> Back category List</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update',$category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                              <div class="col-md-7 mb-3">
                                <label for="name">Category</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{$category->name }}">
                              </div>
                              <div class="col-md-3 mb-3" style="margin-top: 28px">
                                <button class="btn btn-success" type="submit">Update!</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
         </div>
     </div>
@endsection