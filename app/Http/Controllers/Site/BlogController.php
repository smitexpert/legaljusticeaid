<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use App\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        return  view('site.index');
    }

    public function category($slug)
    {
        if(BlogCategory::where('slug', $slug)->exists()){
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $categoryName = $category->name;
            $categoryPosts = $category->posts()->orderBy('id', 'desc')->paginate(11);
            $popularposts =  $category->posts()->withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
        }else{
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $categoryName = $slug;
            $categoryPosts = BlogCategory::where('slug', $slug)->paginate(11);
            $popularposts =  $category->posts()->withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
        }
        // $categoryName = "";
        // $category = BlogCategory::where('slug', $slug)->firstOrFail();
        // $category = $category->setRelation('blog_posts', $category->posts);

        // return $popularposts;

        // return view('frontend.blogs.category', compact('categoryPosts', 'categoryName', 'popularposts'));
        return  view('site.category', compact('categoryPosts', 'categoryName'));
    }

    public function single($slug)
    {
        $post = BlogPost::with('comments', 'comments.username')->where('slug', $slug)->FirstOrFail();
        $relateds = BlogPost::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('slug', $post->tags->pluck('slug')); 
        })
        ->where('id', '!=', $post->id) // So you won't fetch same post
        ->limit(6)
        ->get();

        // return view('frontend.blogs.single', compact('post', 'relateds'));
        return  view('site.single', compact('post', 'relateds'));
    }
}
