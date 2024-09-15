@extends('admin.layouts.template')

@section('page_title')
    All Category | My Shop
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">All Category List</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Sub Category Count</th>
                        <th>Product Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td>Cook</td>
                        <td>3</td>
                        <td>3</td>
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
