<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function category_page($id){
        $category = Category::findOrFail($id);
        $products = Product::where('');
        return view('user.category', compact('category'));
    }

    public function single_product(){
        return view('user.single_product');
    }

    public function add_to_cart(){
        return view('user.add_to_cart');
    }

    public function checkout(){
        return view('user.checkout');
    }

    public function user_profile(){
        return view('user.user_profile');
    }
}
