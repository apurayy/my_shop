@extends('admin.layouts.template')

@section('page_title')
    All Product | My Shop
@endsection

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Product List</h5>
            <small class="text-muted float-end">
                <a href="{{route('add_product')}}" class="btn btn-primary">Add New</a>
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
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td>Cook</td>
                        <td>img</td>
                        <td>300.00</td>
                        <td>
                            <a href="" class="btn btn-primary">Edite</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection
