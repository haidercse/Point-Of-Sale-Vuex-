
@extends('backend.layouts.master')

@section('title')
   Update Brand Form | Point of Sale
@endsection

@section('admin-content')
     <div class="container">
         <div class="row">
             <div class="col-md-10">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Update Brand Form</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                        <a href="{{ route('brand.index') }}" class=" btn btn-warning"><i class="fas fa-long-arrow-alt-right"> Back brand List</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brand.update',$brand->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                              <div class="col-md-7 mb-3">
                                <label for="name">Brand</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{$brand->name }}">
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