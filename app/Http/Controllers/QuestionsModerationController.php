<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsModerationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.moderations.questions');
    }

    public function comments(){
        return view('backend.moderations.comments');
    }

    public function answers(){
        return view('backend.moderations.answers');
    }
}
