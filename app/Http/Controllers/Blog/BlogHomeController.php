<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogPost;
use App\FeaturedPost;

class BlogHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function slider()
    {
        $posts = FeaturedPost::with('blog_post')->get();
        return view('backend.home.slider', compact('posts'));
        // return dd($posts);
    }

    public function sliderAdd($id)
    {
        FeaturedPost::insert([
            'post_id' => $id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return back();
    }

    public function sliderRemove($id)
    {
        FeaturedPost::where('id', $id)->delete();
        return back();
    }

    public function list()
    {
        $posts = BlogPost::with('featured')->get();
        return view('backend.home.list', compact('posts'));
        // return dd($posts);
    }
}
