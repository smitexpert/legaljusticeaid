<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class LegalBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.blogs');
    }

    public function add(){
        return view('backend.blogs.add');
    }

    public function categories(){
        $categories = BlogCategory::all();
        return view('backend.blogs.categories', compact('categories'));
    }

    public function addCategories(Request $request){
        $request->validate([
            'category' => 'required|unique:blog_categories,name'
        ]);

        BlogCategory::insert([
            'name' => $request->category,
            'slug' => Str::slug($request->category, '-'),
            'created_at' => Carbon::now()
        ]);
        
        return back()->with('status', 'New Category Add Successfully!');

    }
}
