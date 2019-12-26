<?php

namespace App\Http\Controllers;

use App\Advice;
use App\AdviceAnswer;
use App\AdviceCategory;
use App\Notifications\AnswerNotification;
use App\Notifications\QuestionNotification;
use App\PracticeArea;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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

        $notify = [
            'user' => Auth::user()->name,
            'question' => $request->title
        ];

        // $notify['user'] = Auth::user()->name;
        // $notify['question'] = $request->title;

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
            'slug' => $advice_id
        ]);

        AdviceCategory::insert([
            'practicearea_id' => $request->category,
            'advice_id' => $advice_id,
            'created_at' => Carbon::now()
        ]);

        $moderator = User::whereRaw('user_role <= 4')->get();

        Notification::send($moderator, new QuestionNotification($notify));

        return back()->with('status', 'Your Request is pending for publish!');
    }

    public function addAdvice(Request $request, $id){
        $request->validate([
            'answer' => 'required'
        ]);

        // $advice_id = Advice::where('id', $id)->firstOrFail()->id;

        AdviceAnswer::insert([
            'advice_id' => $id,
            'user_id' => Auth::user()->id,
            'answer' => $request->answer,
            'created_at' => Carbon::now()
        ]);

        $notify = [
            'advice' => Advice::find($id)->title,
            'user' => Auth::user()->name
        ];

        $user_id = Advice::find($id)->user_id;


        $moderator = User::whereRaw('user_role <= 4')->get();

        Notification::send($moderator, new AnswerNotification($notify));
        User::find($user_id)->notify(new AnswerNotification($notify));

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
