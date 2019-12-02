<?php

namespace App\Http\Controllers;

use App\Advice;
use App\AdviceAnswer;
use App\AdviceCategory;
use App\PracticeArea;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdviceAddController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        $areas = PracticeArea::all();
        return view("frontend.advice.add", compact('areas'));
    }

    public function addNew(Request $request){
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'category' => 'required'
        ]);

        if(Auth::user()->user_role <= 2){
            $advice_id = Advice::insertGetId([
                'title' => $request->title,
                'details' => $request->details,
                'status' => true,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
        }else{
            $advice_id = Advice::insertGetId([
                'title' => $request->title,
                'details' => $request->details,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
        }

        Advice::findOrFail($advice_id)->update([
            'slug' => Slug::slug($request->title, '-')."-".$advice_id
        ]);

        AdviceCategory::insert([
            'practicearea_id' => $request->category,
            'advice_id' => $advice_id,
            'created_at' => Carbon::now()
        ]);

        return back()->with('status', 'Your Request is pending for publish!');
    }

    public function addAdvice(Request $request, $slug){
        $request->validate([
            'answer' => 'required'
        ]);

        $advice_id = Advice::where('slug', $slug)->firstOrFail()->id;

        AdviceAnswer::insert([
            'advice_id' => $advice_id,
            'user_id' => Auth::user()->id,
            'answer' => $request->answer,
            'created_at' => Carbon::now()
        ]);

        return back()->with('status', 'Answer Successfully Published');
    }

    public function markAnswer(Request $request, $slug){
        Advice::findOrFail($request->adviceid)->update([
            'is_answerd' => true
        ]);

        AdviceAnswer::findOrFail($request->markid)->update([
            'is_best' => true
        ]);

        return back();
    }
}
