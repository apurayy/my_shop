<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_product(){
        return view('admin.all_product');
    }

    public function add_product(){
        return view('admin.add_product');
    }
}
