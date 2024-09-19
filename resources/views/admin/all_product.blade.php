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
                    @foreach ($products as $product)

                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>
                            <img style="width: 130px; height:100px; margin-bottom:5px;" src="{{ asset($product->product_img) }}" alt=""><br>
                            <a href="{{ route('edit_pro_img', $product->id) }}" class="btn btn-primary">Update Image</a>
                        </td>
                        <td>{{ $product->product_price }}</td>
                        <td>
                            <a href="{{ route('edit_product', $product->id) }}" class="btn btn-primary">Edite</a>
                            <a href="{{ route('delete_product', $product->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
