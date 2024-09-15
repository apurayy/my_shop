@extends('admin.layouts.template')

@section('page_title')
    Add Category | My Shop
@endsection

@section('content')
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add Category</h5>
                {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="Category">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="Category" placeholder="Category Name">
                    </div>


                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
