<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        return  view('site.index');
    }

    public function category()
    {
        return  view('site.category');
    }

    public function single()
    {
        return  view('site.single');
    }
}
