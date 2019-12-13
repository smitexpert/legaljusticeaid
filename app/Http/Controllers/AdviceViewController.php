<?php

namespace App\Http\Controllers;

use App\Advice;
use App\PracticeArea;
use Illuminate\Http\Request;

class AdviceViewController extends Controller
{
    public function index(){
        $advices  = Advice::with('category', 'answers')->where('status', 1)->orderBy('id', 'desc')->paginate(10);
        // print_r($advices);
        $recents = Advice::where('is_answerd', 1)->orderBy('updated_at', 'desc')->limit(8)->get();
        return view('frontend.advice.advice', compact('advices', 'recents'));
    }

    public function single($slug){
        $advice = Advice::with('category', 'answers', 'answers.user')->where('id', $slug)->firstOrFail();
        $tags = $advice->category();
        $relateds = Advice::whereHas('category', function ($q) use ($advice) {
            return $q->whereIn('slug', $advice->category->pluck('slug')); 
        })
        ->where('id', '!=', $advice->id) // So you won't fetch same post
        ->limit(5)
        ->get();
        return view('frontend.advice.single', compact('advice', 'relateds'));
    }
}
