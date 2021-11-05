@extends('backend.layouts.master')

@section('title')
    Product Show | Point of Sale
@endsection

@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Show Product </h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                       
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-header">
                                    <h4>Product Info</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="data-table">

                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <td>{{ $product->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Product SKU</th>
                                            <td>{{ $product->sku ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Product Category</th>
                                            <td>{{ $product->category->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Product Brand</th>
                                            <td>{{ $product->brand->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Product Cost Price</th>
                                            <td>{{ $product->cost_price ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Product Description</th>
                                            <td>{{ $product->description ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Status</th>
                                            <td>{{ $product->status ? 'Active' : 'Inactive' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Product Year</th>
                                            <td>{{ $product->year ?? '' }}</td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('product.index') }}" class=" btn btn-dark btn-sm"><i
                                        class="fas fa-long-arrow-alt-left"> Back Product List</i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-header">
                                    <h4>Product Stock Details</h4>
                                </div>
                                <div class="card-body text-center">
                                    <img src="{{ asset('images/products/'.$product->image) }}" alt="" width="300">
                                </div>
                                <div class="card-header">
                                    <h4>Product Stock</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="data-table">
                                        @foreach ($product->product_stocks as $stock)
                                            <tr>
                                                <td>{{ $stock->size->size ?? '' }}</td>
                                                <td>{{ $stock->location ?? '' }}</td>
                                                <td>{{ $stock->quantity ?? 0 }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
