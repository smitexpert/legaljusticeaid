<?php

namespace App\Http\Controllers;

use App\Advice;
use Illuminate\Http\Request;

class QuestionsModerationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $questions = Advice::orderBy('id', 'DESC')->get();
        return view('backend.moderations.questions', compact('questions'));
    }

    public function disapprove($id){
        Advice::findOrFail($id)->update([
            'status' => false
        ]);
        return back()->with('status', 'Question Disapproved Successfully!');
    }

    public function approve($id){
        Advice::findOrFail($id)->update([
            'status' => true
        ]);
        return back()->with('status', 'Question Approved Successfully!');
    }

    public function remove($id){
        Advice::findOrFail($id)->delete();
        return back()->with('status', 'Question Deleted Successfully!');
    }

    public function trush(){
        $questions = Advice::onlyTrashed()->orderBy('id', 'DESC')->get();
        return view('backend.moderations.questions.trush', compact('questions'));
    }

    public function restore($id){
        Advice::onlyTrashed()->where('id', $id)->restore();
        return back()->with('status', 'Question Restored Successfully!');
    }

    public function delete($id){
        Advice::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('status', 'Question Deleted Successfully!');
    }

    public function view($id){
        $question = Advice::findOrFail($id);
        return view('backend.moderations.questions.view', compact('question'));;
    }
}
