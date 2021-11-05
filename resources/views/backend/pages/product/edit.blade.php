@extends('backend.layouts.master')

@section('title')
    Product Update Form | Point of Sale
@endsection

@section('admin-content')
     <div class="container">
         <div class="row">
            <div class="col-md-10">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Update Product Form</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                        <a href="{{ route('product.index') }}" class=" btn btn-warning"><i class="fas fa-long-arrow-alt-right"> Back Product List</i></a>
                    </div>
                      
                      {{-- import vue for product --}}
                      
                </div>
             </div>
            
         </div>
         <product-edit :product="{{ $product }}"></product-edit>
     </div>
@endsection