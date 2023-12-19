@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Sales</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sales</li>
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
                                    <a href="{{ route('sales.create') }}" class="btn btn-success"
                                        id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Add
                                        Sales</a>
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
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->product_name }}</td>
                                            <td>{{ $transaction->price }}</td>
                                            <td>{{ $transaction->quantity }}</td>
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