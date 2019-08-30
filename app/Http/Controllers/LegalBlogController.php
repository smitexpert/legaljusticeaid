<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('backend.blogs.add');
    }

    public function categories(){
        return view('backend.blogs.categories');
    }
}
