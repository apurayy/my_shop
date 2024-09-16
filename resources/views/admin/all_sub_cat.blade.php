@extends('admin.layouts.template')

@section('page_title')
    All Sub Category | My Shop
@endsection

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Sub Category List</h5>
            <small class="text-muted float-end">
                <a href="{{route('add_sub_category')}}" class="btn btn-primary">Add New</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">

            @if (@session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Sub Category Name</th>
                        <th>Category Name</th>
                        <th>Product Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($sub_categories as $sub_cat)
                        <tr>
                            <td>{{ $sub_cat->id }}</td>
                            <td>{{ $sub_cat->sub_category_name }}</td>
                            <td>{{ $sub_cat->category_name }}</td>
                            <td>{{ $sub_cat->product_count }}</td>
                            <td>
                                <a href="{{ route('edit_sub_category',$sub_cat->id) }}" class="btn btn-primary">Edite</a>
                                <a href="{{ route('delete_sub_category',$sub_cat->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
