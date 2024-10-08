@extends('admin.layouts.template')

@section('page_title')
    Add Product | My Shop
@endsection

@section('content')
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add New Product</h5>
                {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
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

                    <div class="mb-3">
                        <label class="form-label" for="Category">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="Category"
                            placeholder="Product Name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="number" name="product_price" class="form-control" placeholder="100.00">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Quantity</label>
                        <input type="number" name="product_quantity" class="form-control" placeholder="50">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Short Description</label>
                        <textarea name="product_short_des" class="form-control" cols="30" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Long Description</label>
                        <textarea name="product_long_des" class="form-control" cols="30" rows="10"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="category_id " class="form-label">Category Select</label>
                        <select id="category_id " class="form-select" name="category_id">
                            <option>Select Product Category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Sub Category Select</label>
                        <select id="defaultSelect" class="form-select" name="sub_category_id">
                            <option>Select Sub Category</option>

                            @foreach ($subcategories as $sub_cat)
                                <option value="{{ $sub_cat->id }}">{{ $sub_cat->sub_category_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Product Image</label>
                        <input type="file" name="product_img" class="form-select">
                    </div>

                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
