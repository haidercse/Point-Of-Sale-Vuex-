@extends('backend.layouts.master')

@section('title')
    Product Stock History | Point of sale 
@endsection

@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Product Stock History</h3>
                    </div>
                    {{-- <div class="mt-3 justify-content-between">
                      <a href="{{ route('pro') }}" class="float-right btn btn-info"><i class="fas fa-plus-circle"> Add Category</i></a>
                    </div> --}}
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $stock->product->name }}</td>
                                        <td>{{ $stock->size->size }}</td>
                                        <td>{{ $stock->quantity }}</td>
                                        <td>{{ $stock->date }}</td>
                                        <td>{{ $stock->status }}</td>
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
