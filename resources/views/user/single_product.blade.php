@extends('user.layouts.template')

@section('main_content')
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img">
                        <img src="{{ asset($single_product->product_img) }}">
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="box_main">
                    <h4 class="shirt_text text-left">{{ $single_product->product_name }}</h4>
                    <p class="price_text text-left">Price  <span style="color: #262626;">Tk. {{ $single_product->product_price }}</span></p>
                    <div class="product_details">
                        <p class="lead mb-2">{{ $single_product->product_short_des }}</p>
                        <p class="lead mb-2">{{ $single_product->product_long_des }}</p>

                        <ul class="p-2 my-2">
                            <li>Category - {{ $single_product->category_name }}</li>
                            <li>Sub Category - {{ $single_product->sub_category_name }}</li>
                            <li>Available Quantity - {{ $single_product->product_quantity }}</li>
                        </ul>
                    </div>

                    <div class="btn_main">
                        <div class="btn btn-warning"><a href="#">Add To Cart</a></div>
                     </div>

                </div>
            </div>

        </div>
    </div>
@endsection
