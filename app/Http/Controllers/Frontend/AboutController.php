<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $categories = Category::where('status',1)->get();
        return view('frontend.about.index',['categories'=>$categories]);
    }
}
