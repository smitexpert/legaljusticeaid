<?php

namespace App\Http\Controllers;

use App\BlogComment;
use App\BlogPost;
use App\Notifications\CommentNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class BlogCommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function addComment(Request $request, $id){
        

        $moderator = User::whereRaw('user_role <= 4')->get();
        $blognotify = [];
        $blognotify['blog_title'] = BlogPost::find($id)->title;
        $blognotify['user_id'] = Auth::user()->name;
        $user_id = BlogPost::find($id)->user_id;
        $user = User::find($user_id);

        $request->validate([
            'comments' => 'required'
        ]);

        if(Auth::user()->user_role <= 2){
            BlogComment::insert([
                'comment' => $request->comments,
                'post_id' => $id,
                'status' => '1',
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);


            Notification::send($moderator, new CommentNotification($blognotify));

            $user->notify(new CommentNotification($blognotify));

            return back()->with('commentStatus', 'Comment Has Successfully Posted...');
        }else{
            BlogComment::insert([
                'comment' => $request->comments,
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            Notification::send($moderator, new CommentNotification($blognotify));

            $user->notify(new CommentNotification($blognotify));

            return back()->with('commentStatus', 'Comment Has Successfully Posted for Review...');
        }
    }
}
