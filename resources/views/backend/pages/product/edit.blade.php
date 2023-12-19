@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div>
  </section>
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
                            <div class="float-right">
                                <a href="{{ route('product.index') }}" class="btn btn-success"
                                    id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> ALL
                                    Product</a>
                            </div>
                        </div>

                    </div>
                </div>
                    <div class="card-body">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class=row>
                            <div class="col-md-6 col-sm-4 col-lg-12">
                                <form role="form" action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="row mb-4">
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Name</label>
                                         <input type="text" id="product_name" name="product_name" class="form-control" value="{{$product->product_name}}"  placeholder="enter name"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Slug</label>
                                         <input type="text" id="product_slug" name="product_slug" class="form-control" value="{{$product->product_slug}}"  placeholder="enter slug"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Price</label>
                                         <input type="text" id="product_price" name="product_price" class="form-control" value="{{$product->product_price}}"  placeholder="enter product_price"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Quantity</label>
                                         <input type="number" id="product_price" name="product_quantity" class="form-control" value="{{$product->product_quantity}}"  placeholder="enter product_quantity"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Stock</label>
                                         <input type="number" id="product_stock" name="product_stock" class="form-control" value="{{$product->product_stock}}"  placeholder="enter product_stock"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Image</label>
                                         <input type="file" id="product_img" name="product_img" class="form-control" value=""/>
                                         <img src="{{ asset('uploads/product/' . $product->product_img) }}" alt="" height="100" width="100">
                                         <input type="hidden" name="old_product_img" class="form-control" value="{{ $product->product_img }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  <!-- Submit button -->
                                  <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                                </form>
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