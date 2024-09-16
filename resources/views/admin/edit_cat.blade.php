@extends('admin.layouts.template')

@section('page_title')
    Edit Category | My Shop
@endsection

@section('content')
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Category</h5>
                {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">

                {{-- ==error message =================--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- ==error message =================--}}

                <form action="{{ route('update_category') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $cat_info->id }}" name="cat_id">
                    <div class="mb-3">
                        <label class="form-label" for="Category">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="Category"
                            value="{{ $cat_info->category_name }}">
                    </div>


                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
