<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all_category(){
        return view('admin.all_cat');
    }

    public function add_category(){
        return view('admin.add_cat');
    }

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


}
