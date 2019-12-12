<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogViewController extends Controller
{
    public function index(){
        $posts = BlogPost::with('category', 'user')->orderBy('id', 'desc')->paginate(10);
        return view('frontend.blogs.view', compact('posts'));
    }

    public function singleView($slug){
        $post = BlogPost::with('comments', 'comments.username')->where('slug', $slug)->FirstOrFail();
        return view('frontend.blogs.single', compact('post'));
    }

    public function categoryView($slug){
        if(BlogCategory::where('slug', $slug)->exists()){
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $categoryName = $category->name;
            $categoryPosts = $category->posts()->orderBy('id', 'desc')->paginate(10);
        }else{
            $categoryName = $slug;
            $categoryPosts = BlogCategory::where('slug', $slug)->paginate(10);
        }
        // $categoryName = "";
        // $category = BlogCategory::where('slug', $slug)->firstOrFail();
        // $category = $category->setRelation('blog_posts', $category->posts);

        return view('frontend.blogs.category', compact('categoryPosts', 'categoryName'));
    }
}
