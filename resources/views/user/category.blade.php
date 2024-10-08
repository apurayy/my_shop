@extends('user.layouts.template')

@section('main_content')

    <h2 style="padding-top: 50px">{{ $category->category_name}} - ({{$category->product_count}})</h2>

@endsection
