<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeaturedPost;
use App\HomeCategory;
use App\BlogPost;

class IndexController extends Controller
{
    public function index()
    {
        $featured = FeaturedPost::get();
        $tableOne = HomeCategory::where('table_name', 'table_one')->first();
        $tableTwo = HomeCategory::where('table_name', 'table_two')->first();
        $recent = BlogPost::orderBy('id', 'desc')->limit(10)->get();
        return view('blog.index', compact('featured', 'tableOne', 'tableTwo', 'recent'));
    }

    public function single()
    {
        return view('blog.single');
    }

    public function category()
    {
        return view('blog.category');
    }
}
