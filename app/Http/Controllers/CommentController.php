<?php

namespace App\Http\Controllers;

use App\BlogComment;
use App\BlogPost;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        $comments = BlogComment::where('status', 0)->get();
        return view('backend.moderations.comments', compact('comments'));
    }

    public function approve($id){
        BlogComment::findOrFail($id)->update([
            'status' => '1'
        ]);

        return back()->with('status', 'Comment Approved Successfully!');
    }

    public function remove($id){
        BlogComment::findOrFail($id)->delete();

        return back()->with('status', 'Comment Removed Successfully!');
    }

    public function trush(){
        $comments = BlogComment::onlyTrashed()->get();
        return view('backend.moderations.comments.trush', compact('comments'));
    }

    public function restore($id){
        BlogComment::onlyTrashed()->where('id', $id)->restore();
        return back()->with('status', 'Comment Restored Successfully!');
    }

    public function delete($id){
        BlogComment::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('status', 'Comment Deleted Successfully!');
    }

    public function all(){
        $posts = BlogPost::where('status', 1)->get();
        return view('backend.moderations.comments.all', compact('posts'));
    }

    public function postComments($id){
        $comments = BlogComment::where('post_id', $id)->get();
        $post = BlogPost::findOrFail($id);
        return view('backend.moderations.comments.postcomment', compact('comments', 'post'));
    }
}
