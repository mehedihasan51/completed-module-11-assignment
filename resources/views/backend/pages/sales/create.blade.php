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
                                <a href="{{ route('sales.index') }}" class="btn btn-success"
                                    id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> ALL
                                    Sales</a>
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
                                <form role="form" action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="row mb-4">
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Name</label>
                                         <select class="form-select" name="product_id" id="product_id">
                                            <option selected disabled>Choose Products...</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->product_price }}">{{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Price</label>
                                         <input type="text" name="price" class="form-control" id="price-input">
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Quantity</label>
                                         <input type="text" name="quantity" class="form-control" id="quantity">
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-outline">
                                         <label class="form-label" for="size">Product Quantity</label>
                                         <input type="number" id="product_price" name="product_quantity" class="form-control" value=""  placeholder="enter product_quantity"/>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle change event on the dropdown
        $('#product_id').change(function () {
            // Get the selected option
            var selectedOption = $(this).find('option:selected');

            // Update the price input with the data-price attribute of the selected option
            $('#price-input').val(selectedOption.data('product_price'));
        });
    });
</script>