<?php

use App\Http\Controllers\Backend\BackendBlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\AboutController;
use Illuminate\Support\Facades\Route;

// Frontend

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/blog', [BlogController::class,'index'])->name('blog');
Route::get('/about', [AboutController::class,'index'])->name('about');

// Backend

Route::get('admin/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
Route::get('admin/category/create', [CategoryController::class,'create'])->name('admin.category.create');
Route::post('admin/category/store', [CategoryController::class,'store'])->name('admin.category.store');
Route::get('admin/category/index', [CategoryController::class,'index'])->name('admin.category.index');
Route::get('admin/category/edit/{id}', [CategoryController::class,'edit'])->name('admin.category.edit');
Route::post('admin/category/update/{id}', [CategoryController::class,'update'])->name('admin.category.update');
Route::post('admin/category/destroy/{id}', [CategoryController::class,'destroy'])->name('admin.category.destroy');

Route::resource('blogs', BackendBlogController::class);
