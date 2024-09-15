@extends('admin.layouts.template')

@section('page_title')
Add Sub Category | My Shop
@endsection

@section('content')

<div class="col-xl-6">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Add Sub Category</h5>
            {{-- <small class="text-muted float-end">Default label</small> --}}
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="Category">Sub Category Name</label>
                    <input type="text" name="sub_category_name" class="form-control" id="Category" placeholder="Category Name">
                </div>


                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">Category Name</label>
                    <select id="defaultSelect" class="form-select" name="category_name">
                      <option>Select Category</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>


                <button type="submit" class="btn btn-primary">Add Sub Category</button>
            </form>
        </div>
    </div>
</div>

@endsection
