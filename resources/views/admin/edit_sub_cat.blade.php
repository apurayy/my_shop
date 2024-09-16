@extends('admin.layouts.template')

@section('page_title')
Edit Sub Category | My Shop
@endsection

@section('content')

<div class="col-xl-6">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Sub Category</h5>
            {{-- <small class="text-muted float-end">Default label</small> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('update_sub_category') }}" method="POST">
                @csrf

                <input type="hidden" name="sub_cat_id" value="{{ $sub_cat_info->id }}">
                <div class="mb-3">
                    <label class="form-label" for="Category">Sub Category Name</label>
                    <input type="text" name="sub_category_name" class="form-control" id="Category" value="{{ $sub_cat_info->sub_category_name }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Sub Category</button>
            </form>
        </div>
    </div>
</div>

@endsection
