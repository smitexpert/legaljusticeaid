<?php

namespace App\Http\Controllers;

use App\BlogComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function addComment(Request $request, $id){
        

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

            return back()->with('commentStatus', 'Comment Has Successfully Posted...');
        }else{
            BlogComment::insert([
                'comment' => $request->comments,
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            return back()->with('commentStatus', 'Comment Has Successfully Posted for Review...');
        }
    }
}
