<?php

namespace App\Http\Controllers;

use App\PracticeArea;
use Illuminate\Http\Request;

class AdviceCategoryController extends Controller
{
    public function index($slug){
        if(PracticeArea::where('slug', $slug)->exists()){
            $category = PracticeArea::where('slug', $slug)->firstOrFail();
            $categoryName = $category->name;
            $advices = $category->advices()->orderBy('id', 'desc')->paginate(10);
        }else{
            $categoryName = $slug;
            $advices = PracticeArea::where('slug', $slug)->paginate(10);
        }

        return view('frontend.advice.category', compact('advices', 'categoryName'));
        // return view('frontend.advice.category');
    }
}
