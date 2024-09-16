@extends('admin.layouts.template')

@section('page_title')
    All Category | My Shop
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Category List</h5>
            <small class="text-muted float-end">
                <a href="{{route('add_category')}}" class="btn btn-primary">Add New</a>
            </small>
        </div>

        @if (@session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Sub Category Count</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach ($categoris as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name  }}</td>
                            <td>{{ $category->sub_category_count  }}</td>
                            <td>{{ $category->slug   }}</td>
                            <td>
                                <a href="{{ route('edit_category',$category->id) }}" class="btn btn-primary">Edite</a>
                                <a href="{{ route('delete_category',$category->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
