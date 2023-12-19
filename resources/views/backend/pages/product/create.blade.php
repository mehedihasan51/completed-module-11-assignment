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
                                <form role="form" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="row mb-4">
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Name</label>
                                         <input type="text" id="product_name" name="product_name" class="form-control" value=""  placeholder="enter name"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Slug</label>
                                         <input type="text" id="product_slug" name="product_slug" class="form-control" value=""  placeholder="enter slug"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Price</label>
                                         <input type="text" id="product_price" name="product_price" class="form-control" value=""  placeholder="enter product_price"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Quantity</label>
                                         <input type="number" id="product_price" name="product_quantity" class="form-control" value=""  placeholder="enter product_quantity"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Stock</label>
                                         <input type="number" id="product_stock" name="product_stock" class="form-control" value=""  placeholder="enter product_stock"/>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Image</label>
                                         <input type="file" id="product_img" name="product_img" class="form-control" value=""/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  <!-- Submit button -->
                                  <button type="submit" class="btn btn-primary btn-block mb-4">submit</button>
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