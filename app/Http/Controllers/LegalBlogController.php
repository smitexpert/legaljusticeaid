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
use Image;

class LegalBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = BlogPost::where('user_id', Auth::user()->id)->get();
        return view('backend.blogs', compact('posts'));
    }

    public function add(){
        $categories = BlogCategory::all();
        return view('backend.blogs.add', compact('categories'));
    }

    public function addPost(Request $request){
        $request->validate([
            'title' => 'required',
            'cover' => 'required',
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

        if($request->hasFile('cover')){
            $photo = $request->cover;
            $extension = $photo->getClientOriginalExtension();
            $photo_name = $post_id.'.'.$extension;
            Image::make($photo)->crop(370, 250)->save(base_path("public/uploaded/post_thumb")."/".$photo_name);
            Image::make($photo)->resize(770, 446)->save(base_path("public/uploaded/post_images")."/".$photo_name);
            BlogPost::findOrFail($post_id)->update([
                'cover' => $photo_name
            ]);
        }

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

        return back()->with('status', 'Post Was Successfully Published!');
    }

    public function postRemove($id){
        if(Auth::user()->user_role <= 2){
            BlogPost::findOrFail($id)->delete();
            return back()->with('status', 'Post Removed Successfully!');
        }else{
            BlogPost::where('id', $id)->where('user_id', Auth::user()->id)->delete();
            return back()->with('status', 'Post Removed Successfully!');
        }
    }

    public function postEdit($id){
        $categories = BlogCategory::all();
        if(Auth::user()->user_role <= 2){
            $post = BlogPost::findOrFail($id);
            return view('backend.blogs.posts.edit', compact('post', 'categories'));
        }else{
            $post = BlogPost::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
            return view('backend.blogs.posts.edit', compact('post', 'categories'));
        }
    }

    public function postUpdate(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'category' => 'required',
            'tags' => 'required'
        ]);

        BlogPost::findOrFail($id)->update([
            'title' => $request->title,
            'article' => $request->details,
        ]);

        $post_id = $id;

        if($request->hasFile('cover')){
            if(BlogPost::findOrFail($id)->cover != "default_cover.jpg"){
                $photo = BlogPost::findOrFail($id)->cover;

                Storage::delete(base_path("public/uploaded/post_thumb").$photo);
                Storage::delete(base_path("public/uploaded/post_images").$photo);

                $photo = $request->cover;
                $extension = $photo->getClientOriginalExtension();
                $photo_name = $post_id.'.'.$extension;
                Image::make($photo)->crop(370, 250)->save(base_path("public/uploaded/post_thumb")."/".$photo_name);
                Image::make($photo)->resize(770, 446)->save(base_path("public/uploaded/post_images")."/".$photo_name);
                BlogPost::findOrFail($post_id)->update([
                    'cover' => $photo_name
                ]);
            }
        }

        BlogPostTag::where('post_id', $id)->delete();
        for($i=0; $i<count($request->tags); $i++){
            $tags[] = [
                'post_id' => $post_id,
                'tag' => $request->tags[$i],
                'slug' => Str::slug($request->tags[$i], '-'),
                'created_at' => Carbon::now()
            ];
        }

        BlogPostCategory::where('post_id', $id)->update([
            'cateogry_id' => $request->category
        ]);

        BlogPostTag::insert($tags);

        return back()->with('status', 'Post Successfully Updated!');
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

    public function trush(){
        $posts = BlogPost::onlyTrashed()->where('user_id', Auth::user()->id)->get();
        return view('backend.blogs.posts.trush', compact('posts'));
    }

    public function trushDelete($id){
        if(Auth::user()->user_role <= 2){
            BlogPost::onlyTrashed()->where('id', $id)->forceDelete();
            return back()->with('status', 'Deleted Successfully!');
        }else{
            BlogPost::onlyTrashed()->where('id', $id)->where('user_id', Auth::user()->id)->forceDelete();
            return back()->with('status', 'Deleted Successfully!');
        }
    }

    public function trushRestore($id){
        if(Auth::user()->user_role <= 2){
            BlogPost::onlyTrashed()->where('id', $id)->restore();
            return back()->with('status', 'Restored Successfully!');
        }else{
            BlogPost::onlyTrashed()->where('id', $id)->where('user_id', Auth::user()->id)->restore();
            return back()->with('status', 'Restored Successfully!');
        }
    }

    public function allPost(){
        $posts = BlogPost::all();
        return view('backend.blogs.posts.all.posts', compact('posts'));
    }

    public function allTrush(){
        $posts = BlogPost::onlyTrashed()->get();
        return view('backend.blogs.posts.all.trush', compact('posts'));
    }
}
