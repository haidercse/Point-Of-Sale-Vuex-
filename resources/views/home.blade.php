@extends('backend.layouts.master')

@section('title')
    Dashboard View  | Point of Sale
@endsection

@section('admin-content')
   <div class="container mt-5">
       <div class="row">
           <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <h1 class="card-header">{{ $total_user }}</h1>
                <div class="card-body">
                  <h5 class="card-title">User </h5>
                  <div class="card-footer">
                    <a class="text-center text-white" href="{{ route('user.index') }}"><i class="fas fa-arrow-circle-right"> More Info</i></a>
                  </div>
                </div>
              </div>
           </div>
           <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <h1 class="card-header">{{ $total_product }}</h1>
                <div class="card-body">
                  <h5 class="card-title">Product </h5>
                  <div class="card-footer">
                    <a class="text-center text-white" href="{{ route('product.index') }}"><i class="fas fa-arrow-circle-right"> More Info</i></a>
                  </div>
                </div>
              </div>
           </div>
           <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <h1 class="card-header">{{  $total_product_stock }}</h1>
                <div class="card-body">
                  <h5 class="card-title">Product Stock </h5>
                  <div class="card-footer">
                    <a class="text-center text-white" href="{{ route('product.stock.history') }}"><i class="fas fa-arrow-circle-right"> More Info</i></a>
                  </div>
                </div>
              </div>
           </div>
           <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <h1 class="card-header">{{  $total_product_return }}</h1>
                <div class="card-body">
                  <h5 class="card-title">Product Return </h5>
                  <div class="card-footer">
                      <a class="text-center text-white" href="{{ route('return.product.history') }}"><i class="fas fa-arrow-circle-right"> More Info</i></a>
                  </div>
                </div>
              </div>
           </div>
           
       </div>

       <div class="card">
           <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product SKU</th>
                        <th scope="col">Product Category</th>
                        <th scope="col">Product Brand</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recent_products as $product)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $product->name ?? '' }}</td>
                            <td>{{ $product->sku ?? '' }}</td>
                            <td>{{ $product->category->name ?? '' }}</td>
                            <td>{{ $product->brand->name ?? '' }}</td>
                            <td>
                                <img src="{{ asset('images/products/'.$product->image) }}" alt="" width="82">
                            </td>
                            <td>
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
@endsection
