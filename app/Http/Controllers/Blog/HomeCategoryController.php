<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use App\HomeCategory;

class HomeCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = BlogCategory::all();
        return view('backend.home.category', compact('categories'));
    }

    public function setcategory(Request $request)
    {
        
        $request->validate([
            'option' => 'required',
            'category' => 'required'
        ]);

        if(HomeCategory::where('table_name', $request->option)->count() > 0)
        {
            HomeCategory::where('table_name', $request->option)->update([
                'table_name' => $request->option,
                'category_id' => $request->category
            ]);
        }else{
            HomeCategory::insert([
                'table_name' => $request->option,
                'category_id' => $request->category,
                'created_at' => now()
            ]);
        }


        return back();
    }
}
