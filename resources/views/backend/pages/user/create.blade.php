@extends('backend.layouts.master')

@section('title')
    user Form | Point of Sale
@endsection

@section('admin-content')
     <div class="container">
         <div class="row">
             <div class="col-md-10">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Add user Form</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                        <a href="{{ route('user.index') }}" class=" btn btn-warning"><i class="fas fa-long-arrow-alt-right"> Back user List</i></a>
                      </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                              <div class="col-md-6">
                                <label for="name">User Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="User Name">
                              </div>
                              <div class="col-md-6">
                                <label for="email">Email  <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter Valid Email">
                              </div>
                              <div class="col-md-6">
                                <label for="password">Password  <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                              </div>
                              <div class="col-md-6">
                                <label for="c_password">Confirm Password  <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control" id="c_password" placeholder="Enter Confirm Password">
                              </div>
                              <div class="col-md-3 mb-3" style="margin-top: 28px">
                                <button class="btn btn-primary" type="submit">Submit</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
         </div>
     </div>
@endsection