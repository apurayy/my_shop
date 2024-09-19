@extends('admin.layouts.template')

@section('page_title')
    Edit Product-Image | My Shop
@endsection

@section('content')
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Product Image</h5>
                {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('update_pro_img') }}" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label">Product Previus Image</label><br>
                        <img style="width: 200px; height:200px;" src="{{ asset($product_info->product_img) }}" alt="">
                    </div>

                    <input type="hidden" name="pro_img_id" value="{{ $product_info->id }}">
                    
                    <div class="mb-3">
                        <label class="form-label">Upload New Image</label>
                        <input type="file" name="product_img" class="form-select">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Image</button>
                </form>
            </div>
        </div>
    </div>
@endsection
