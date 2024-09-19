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
        $products = Product::latest()->get();
        return view('admin.all_product', compact('products'));
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

    //edit_product_img=================
    public function edit_pro_img($id){
        $product_info = Product::findOrFail($id);
        return view('admin.edit_pro_img', compact('product_info'));
    }

    //update_product_img=======================
    public function update_pro_img(Request $request){

        $validated = $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $pro_img_id = $request->pro_img_id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;

        Product::findOrFail($pro_img_id)->update([
            'product_img' => $img_url,
        ]);

        return redirect()->route('all_product')->with('message', 'Product Image Updated Successfully!');
    }
    //product-img-update-end==================


    //edit_product===================
    public function edit_product($id){

        $product_info = Product::findOrFail($id);
        return view('admin.edit_product', compact('product_info'));

    }
    //edit_product===================

    //update_product===================
    public function update_product(Request $request){

        $validated = $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
        ]);

        $pro_id = $request->pro_id;

        Product::findOrFail($pro_id)->update([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'slug' => strtolower(str_replace(' ','-', $request->product_name)),
        ]);

        return redirect()->route('all_product')->with('message', 'Product Updated Successfully!');
    }
    //update_product===================


    //delete_product===================
    public function delete_product($id){

        $cat_id = Product::where('id', $id)->value('category_id');
        $sub_cat_id = Product::where('id', $id)->value('sub_category_id');

        Product::findOrFail($id)->delete();
        
        Category::where('id', $cat_id)->decrement('product_count');
        Subcategory::where('id', $sub_cat_id)->decrement('product_count');

        return redirect()->route('all_product')->with('message', 'Product Deleted Successfully!');

    }
    //delete_product===================


}
