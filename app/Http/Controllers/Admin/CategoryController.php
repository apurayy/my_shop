<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //show_all_category==================
    public function all_category(){
        $categoris = Category::latest()->get();
        return view('admin.all_cat', compact('categoris'));
    }

    //add_category====================
    public function add_category(){
        return view('admin.add_cat');
    }

    //store_category================
    public function store_category(Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-', $request->category_name))
        ]);

        return redirect()->route('all_category')->with('message', 'Category Added Successfully!');

    }

    //edit-category======================
    public function edit_category($id){
        $cat_info = Category::findOrFail($id);

        return view('admin.edit_cat', compact('cat_info'));
    }

    //update_category==================
    public function update_category(Request $request){
        $category_id = $request->cat_id;

        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-', $request->category_name))
        ]);

        return redirect()->route('all_category')->with('message', 'Category Updated Successfully!');
    }


    //delete category===================
    public function delete_category($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('all_category')->with('message', 'Category Deleted Successfully!');
    }


}
