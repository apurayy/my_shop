@extends('admin.layouts.template')

@section('page_title')
    Update Product | My Shop
@endsection

@section('content')
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Product</h5>
                {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('update_product') }}" method="POST">
                    @csrf

                    {{-- ==error message ================= --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- ==error message ================= --}}

                    <input type="hidden" name="pro_id" value="{{ $product_info->id }}">
                    <div class="mb-3">
                        <label class="form-label" for="Category">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="Category"
                            value="{{ $product_info->product_name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="number" name="product_price" class="form-control" value="{{ $product_info->product_price }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Quantity</label>
                        <input type="number" name="product_quantity" class="form-control" value="{{ $product_info->product_quantity }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Short Description</label>
                        <textarea name="product_short_des" class="form-control" cols="30" rows="5">{{ $product_info->product_short_des }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Long Description</label>
                        <textarea name="product_long_des" class="form-control" cols="30" rows="10">{{ $product_info->product_long_des }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
