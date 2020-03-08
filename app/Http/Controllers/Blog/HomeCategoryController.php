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
        // $tableOne = HomeCategory::where('table_name', 'table_one')->first();
        // $table_two = HomeCategory::where('table_name', 'table_two')->first();
        return view('backend.home.category', compact('categories'));
    }

    public function setcategory(Request $request)
    {
        HomeCategory::where('table_name', $request->table_one)->delete();
        HomeCategory::where('table_name', $request->table_two)->delete();

        HomeCategory::insert([
            'table_name' => $request->table_one,
            'category_id' => $request->cat_one,
            'created_at' => now()
        ]);

        HomeCategory::insert([
            'table_name' => $request->table_two,
            'category_id' => $request->cat_two,
            'created_at' => now()
        ]);

        return $request->all();
    }
}
