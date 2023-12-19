@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('product.create') }}" class="btn btn-success"
                                        id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Add
                                        Product</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class=row>
                            <div class="col-md-6 col-sm-4 col-lg-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->product_stock }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/product/' . $product->product_img) }}" alt="" width="100" height="100">
                                        </td>
                                        <td>                                            
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm d-inline-block me-2" href="{{route('product.edit', $product->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
    
                                                <form action="{{route('product.delete', $product->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </a>
                                                </form>
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
        </div>
    </div>
</section>
</div>
@endsection