@extends('backend.layouts.master')

@section('title')
    Product List | Point of sale 
@endsection

@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Product  list</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                      <a href="{{ route('product.create') }}" class="float-right btn btn-info"><i class="fas fa-plus-circle"> Add Product</i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product SKU</th>
                                    <th scope="col">Product Category</th>
                                    <th scope="col">Product Brand</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $product->name ?? '' }}</td>
                                        <td>{{ $product->sku ?? '' }}</td>
                                        <td>{{ $product->category->name ?? '' }}</td>
                                        <td>{{ $product->brand->name ?? '' }}</td>
                                        <td>
                                            <img src="{{ asset('images/products/'.$product->image) }}" alt="" width="82px" height="100px">
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('product.show',$product->id) }}"
                                                class="btn btn-sm btn-info"><i class="far fa-desktop"> Show</i></a>
                                            <a href="{{ route('product.edit',$product->id) }}"
                                                class="btn btn-sm btn-success"><i class="far fa-edit"> Edit</i></a>
                                               
                                            <a href="#delteModal{{ $product->id }}" data-toggle="modal"
                                                class="btn btn-sm btn-danger"><i class="far fa-trash-alt"> Delete</i></a>


                                            <!--Delete  Modal -->
                                            <div class="modal fade" id="delteModal{{ $product->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure
                                                                to delete this?</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('product.destroy', $product->id) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Permanent
                                                                    Delete</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
