<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


    //Front-end-part=======================

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/category/{id}/{slug}', [ClientController::class, 'category_page'])->name('category_page');
    Route::get('/single-product/{id}/{slug}', [ClientController::class, 'single_product'])->name('single_product');
    Route::get('/add-to-cart', [ClientController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/checkout', [ClientController::class, 'checkout'])->name('checkout');
    Route::get('/user-profile', [ClientController::class, 'user_profile'])->name('user_profile');


    //Front-end-part-end=======================


    //back-end-part==========================
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware(['auth', 'role:admin'])->group(function(){

        Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        //Category=======================
        Route::get('/admin/all-category', [CategoryController::class, 'all_category'])->name('all_category');
        Route::get('/admin/add-category', [CategoryController::class, 'add_category'])->name('add_category');
        Route::post('/admin/store-category', [CategoryController::class, 'store_category'])->name('store_category');
        Route::get('/admin/edit-category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');
        Route::post('/admin/update-category', [CategoryController::class, 'update_category'])->name('update_category');
        Route::get('/admin/delete-category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');

        //Sub-Category===================
        Route::get('/admin/all-sub-category', [SubCategoryController::class, 'all_sub_category'])->name('all_sub_category');
        Route::get('/admin/add-sub-category', [SubCategoryController::class, 'add_sub_category'])->name('add_sub_category');
        Route::post('/admin/store-sub-category', [SubCategoryController::class, 'store_sub_category'])->name('store_sub_category');
        Route::get('/admin/edit-sub-category/{id}', [SubCategoryController::class, 'edit_sub_category'])->name('edit_sub_category');
        Route::post('/admin/update-sub-category', [SubCategoryController::class, 'update_sub_category'])->name('update_sub_category');
        Route::get('/admin/delete-sub-category/{id}', [SubCategoryController::class, 'delete_sub_category'])->name('delete_sub_category');

        //Product===================
        Route::get('/admin/all-product',[ProductController::class, 'all_product'])->name('all_product');
        Route::get('/admin/add-product',[ProductController::class, 'add_product'])->name('add_product');
        Route::post('/admin/store-product',[ProductController::class, 'store_product'])->name('store_product');
        Route::get('/admin/edit-product-image/{id}',[ProductController::class, 'edit_pro_img'])->name('edit_pro_img');
        Route::post('/admin/update-product-image',[ProductController::class, 'update_pro_img'])->name('update_pro_img');
        Route::get('/admin/edit-product/{id}',[ProductController::class, 'edit_product'])->name('edit_product');
        Route::post('/admin/update-product',[ProductController::class, 'update_product'])->name('update_product');
        Route::get('/admin/delete-product/{id}',[ProductController::class, 'delete_product'])->name('delete_product');

        //order============
        Route::get('/admin/pending-order', [OrderController::class, 'pending_order'])->name('pending_order');
        // Route::get('/admin/complated-order', [OrderController::class, 'complated_order'])->name('complated_order');
        // Route::get('/admin/cancle-order', [OrderController::class, 'cancle_order'])->name('cancle_order');

    });



require __DIR__.'/auth.php';
