<?php

namespace App\Http\Controllers;

use App\AdviceAnswer;
use Illuminate\Http\Request;

class AnswerModerationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    

    public function index(){
        $answers = AdviceAnswer::orderBy('id', 'desc')->get();
        return view('backend.moderations.answers', compact('answers'));
    }

    public function remove($id){
        AdviceAnswer::find($id)->delete();
        return redirect()->back();
    }

    public function trush(){
        $answers = AdviceAnswer::onlyTrashed()->get();
        return view('backend.moderations.answers.trush', compact('answers'));
    }

    public function restore($id){
        AdviceAnswer::onlyTrashed()->where('id', $id)->restore();
        return back()->with('message', 'Answer Restored Successfully!');
    }
}
