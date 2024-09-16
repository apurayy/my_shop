<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function all_sub_category(){
        $sub_categories = Subcategory::latest()->get();
        return view('admin.all_sub_cat', compact('sub_categories'));
    }

    //add sub category===================
    public function add_sub_category(){
        $categories = Category::latest()->get();
        return view('admin.add_sub_cat', compact('categories'));
    }


    //store sub category=============
    public function store_sub_category(Request $request){

        $validated = $request->validate([
            'sub_category_name' => 'required|unique:subcategories',
            'category_id' => 'required',
        ]);

        $cat_id = $request->category_id;

        $cat_name = Category::where('id', $cat_id)->value('category_name');

        Subcategory::insert([
            'sub_category_name' => $request->sub_category_name,
            'slug' => strtolower(str_replace(' ','-', $request->sub_category_name)),
            'category_id' => $cat_id,
            'category_name' => $cat_name,
        ]);

        Category::where('id', $cat_id)->increment('sub_category_count');

        return redirect()->route('all_sub_category')->with('message', 'Sub Category Added Successfully!');
    }

    //edit-sub-category-===================
    public function edit_sub_category($id){
        $sub_cat_info = Subcategory::findOrFail($id);

        return view('admin.edit_sub_cat', compact('sub_cat_info'));
    }


    //update-sub-category=====================
    public function update_sub_category(Request $request){

        $sub_cat_id = $request->sub_cat_id;

        $validated = $request->validate([
            'sub_category_name' => 'required|unique:subcategories',
        ]);

        Subcategory::findOrFail($sub_cat_id)->update([
            'sub_category_name' => $request->sub_category_name,
            'slug' => strtolower(str_replace(' ','-', $request->sub_category_name)),
        ]);

        return redirect()->route('all_sub_category')->with('message', 'Sub Category Updated Successfully!');
    }
    //update-sub-category-end===================


    //delete-sub-category=============================
    public function delete_sub_category($id){

        $cat_id = Subcategory::where('id', $id)->value('category_id');

        Subcategory::findOrFail($id)->delete();

        Category::where('id', $cat_id)->decrement('sub_category_count');

        return redirect()->route('all_sub_category')->with('message', 'Sub Category Deleted Successfully!');
    }
    //delete-sub-category=============================


}
