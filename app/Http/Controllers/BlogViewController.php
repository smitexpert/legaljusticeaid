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
        $relateds = BlogPost::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('slug', $post->tags->pluck('slug')); 
        })
        ->where('id', '!=', $post->id) // So you won't fetch same post
        ->limit(5)
        ->get();

        return view('frontend.blogs.single', compact('post', 'relateds'));
    }

    public function categoryView($slug){
        if(BlogCategory::where('slug', $slug)->exists()){
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $categoryName = $category->name;
            $categoryPosts = $category->posts()->orderBy('id', 'desc')->paginate(10);
            $popularposts =  $category->posts()->withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
        }else{
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $categoryName = $slug;
            $categoryPosts = BlogCategory::where('slug', $slug)->paginate(10);
            $popularposts =  $category->posts()->withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
        }
        // $categoryName = "";
        // $category = BlogCategory::where('slug', $slug)->firstOrFail();
        // $category = $category->setRelation('blog_posts', $category->posts);

        // return $popularposts;

        return view('frontend.blogs.category', compact('categoryPosts', 'categoryName', 'popularposts'));
    }
}
