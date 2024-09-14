<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all_category(){
        return view('admin.all_cat');
    }

    public function add_category(){
        return view('admin.add_cat');
    }
}
