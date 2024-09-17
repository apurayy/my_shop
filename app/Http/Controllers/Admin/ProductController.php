<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_product(){
        return view('admin.all_product');
    }

    public function add_product(){
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.add_product', compact('categories', 'subcategories'));
    }

    //store product===============
    public function store_product(Request $request){

        $validated = $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;

        $cat_id = $request->category_id;
        $cat_name = Category::where('id', $cat_id)->value('category_name');

        $sub_cat_id = $request->sub_category_id;
        $sub_cat_name = Subcategory::where('id', $sub_cat_id)->value('sub_category_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'category_name' => $cat_name,
            'sub_category_name' => $sub_cat_name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace(' ','-', $request->product_name)),
        ]);

        Category::where('id', $cat_id)->increment('product_count');
        Subcategory::where('id', $sub_cat_id)->increment('product_count');

        return redirect()->route('all_product')->with('message', 'Product Added Successfully!');

    }


}
