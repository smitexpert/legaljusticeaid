<?php

namespace App\Http\Controllers;

use App\Advice;
use App\PracticeArea;
use Illuminate\Http\Request;

class AdviceViewController extends Controller
{
    public function index(){
        $advices  = Advice::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        // print_r($advices);
        return view('frontend.advice.advice', compact('advices'));
    }

    public function single($slug){
        $advice = Advice::with('answers')->where('id', $slug)->firstOrFail();
        return view('frontend.advice.single', compact('advice'));
    }
}
