@extends('backend.layouts.master')

@section('title')
    Product Stock | Point of Sale
@endsection

@section('admin-content')
     <div class="container">
         <div class="row">
            <div class="col-md-10">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Add Return Product</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                        <a href="{{ route('admin.dashboard') }}" class=" btn btn-warning"><i class="fas fa-long-arrow-alt-right"> Bcak Dashbosrd</i></a>
                    </div>
                      
                      {{-- import vue for product --}}
                      
                </div>
             </div>
            
         </div>
         <return-product></return-product>
     </div>
@endsection