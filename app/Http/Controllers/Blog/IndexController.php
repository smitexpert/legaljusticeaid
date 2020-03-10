<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeaturedPost;
use App\HomeCategory;
use App\BlogPost;
use App\BlogCategory;

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

    public function recent()
    {
        $posts = BlogPost::orderBy('id', 'desc')->paginate(10);
        return view('blog.recent', compact('posts'));
    }

    public function single($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $next = BlogPost::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
        $prev = BlogPost::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $relateds = BlogPost::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('slug', $post->tags->pluck('slug')); 
        })
        ->where('id', '!=', $post->id) // So you won't fetch same post
        ->limit(3)
        ->get();
        return view('blog.single', compact('post', 'next', 'prev', 'relateds'));
    }

    public function category($slug)
    {
        if(BlogCategory::where('slug', $slug)->exists()){
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $categoryName = $category->name;
            $categoryPosts = $category->posts()->orderBy('id', 'desc')->paginate(10);
        }else{
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $categoryName = $slug;
            $categoryPosts = BlogCategory::where('slug', $slug)->paginate(10);
            $popularposts =  $category->posts()->withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
        }
        return view('blog.category', compact('category', 'categoryPosts'));
    }
}
