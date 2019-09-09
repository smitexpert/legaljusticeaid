<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogViewController extends Controller
{
    public function index(){
        $posts = BlogPost::orderBy('id', 'desc')->paginate(10);
        return view('frontend.blogs.view', compact('posts'));
    }

    public function singleView($slug){
        $post = BlogPost::where('slug', $slug)->FirstOrFail();
        return view('frontend.blogs.single', compact('post'));
    }
}
