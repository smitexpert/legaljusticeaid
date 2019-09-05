<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\BlogPostCategory;
use App\BlogPostTag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $categories = BlogCategory::all();
        return view('backend.blogs.add', compact('categories'));
    }

    public function addPost(Request $request){
        $request->validate([
            'title' => 'required',
            'feature-img' => 'required',
            'details' => 'required',
            'category' => 'required',
            'tags' => 'required'
        ]);

        $post_id = BlogPost::insertGetId([
            'title' => $request->title,
            'article' => $request->details,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        BlogPost::findOrFail($post_id)->update([
            'slug' => Str::slug($request->title.' '.$post_id, '-')
        ]);

        for($i=0; $i<count($request->tags); $i++){
            $tags[] = [
                'post_id' => $post_id,
                'tag' => $request->tags[$i],
                'slug' => Str::slug($request->tags[$i], '-'),
                'created_at' => Carbon::now()
            ];
        }

        BlogPostTag::insert($tags);

        BlogPostCategory::insert([
            'cateogry_id' => $request->category,
            'post_id' => $post_id,
            'created_at' => Carbon::now()
        ]);

        return $request->all();
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

    public function removeCategory($id){
        BlogCategory::findOrFail($id)->delete();
        return back()->with('status', 'Category Remove Successfully!');
    }

    public function categoryTrush(){
        $categories = BlogCategory::onlyTrashed()->get();
        return view('backend.blogs.categories.trush', compact('categories'));
    }

    public function categoryRestore($id){
        BlogCategory::onlyTrashed()->where('id', $id)->restore();
        return back()->with('status', 'Category Restored Successfully!');
    }

    public function categoryDelete($id){
        BlogCategory::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('status', 'Category Deleted Successfully!');
    }

    public function categoryEdit($id){
        $category = BlogCategory::findOrFail($id);
        return view('backend.blogs.categories.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id){
        $request->validate([
            'category' => 'required|unique:blog_categories,name'
        ]);

        BlogCategory::findOrFail($id)->update([
            'name' => $request->category,
            'slug' => Str::slug($request->category, '-')
        ]);

        return back()->with('status', 'Category Updated Successfully!');

        return $request->all();
    }
}
