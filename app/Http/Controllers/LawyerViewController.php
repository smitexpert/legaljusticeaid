<?php

namespace App\Http\Controllers;

use App\Court;
use App\Lawyer;
use App\LawyerRatings;
use App\PracticeArea;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LawyerViewController extends Controller
{
    //

    public function index(){
        // $lawyers = Lawyer::orderBy('id', 'desc')->paginate(10);
        // return view("frontend.lawyers.list", compact('lawyers'));
        $lawyers = Lawyer::withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(ratings),0)'));
        }])->orderByDesc('average_rating')->paginate(10);

        return view("frontend.lawyers.list", compact('lawyers'));
    }

    public function view($slug){
        $lawyer = Lawyer::where('slug', $slug)->firstOrFail();
        $lawyer->setRelation('ratings', $lawyer->ratings()->paginate(10));
            
        return view("frontend.lawyers.view", compact('lawyer'));
    }

    public function postFeedback( Request $request, $slug){
        $request->validate([
            'rate' => 'required',
            'feedback' => 'required',
            'user' => 'required',
            'lawyer' => 'required'
        ]);

        LawyerRatings::insert([
            'ratings' => $request->rate,
            'feedback' => $request->feedback,
            'users_id' => $request->user,
            'lawyers_id' => $request->lawyer,
            'created_at' => Carbon::now()
        ]);

        return back()->with('message', 'Your Feedback submitted successfully!');
    }

    public function practiceAreas($slug){

        if (PracticeArea::where('slug', $slug)->exists()) {
            $practiceAreas = PracticeArea::where('slug', $slug)->firstOrFail();
            $practiceAreasName = $practiceAreas->name;
            $practiceAreasLawyer = $practiceAreas->practiceAreasLawyers()->orderBy('experience', 'desc')->paginate(10);
         }else{
            $practiceAreasLawyer = PracticeArea::where('slug', $slug)->paginate(10);
            $practiceAreasName = $slug;
         }

        // $practiceAreas = PracticeArea::where('slug', $slug)->firstOrFail();
        // $practiceAreasLawyer = $practiceAreas->practiceAreasLawyers()->orderBy('experience', 'desc')->paginate(10);

        return view("frontend.lawyers.practiceareas", compact("practiceAreasLawyer", "practiceAreasName"));
    }

    public function specializations($slug){

        if (Specialization::where('slug', $slug)->exists()) {
            $specializations = Specialization::where('slug', $slug)->firstOrFail();
            $specializationsName = $specializations->name;
            $specializationLawyers = $specializations->specializations()->orderBy('experience', 'desc')->paginate(10);
         }else{
            $specializationLawyers = Specialization::where('slug', $slug)->paginate(10);
            $specializationsName = $slug;
         }

        // $specializations = Specialization::where('slug', $slug)->firstOrFail();
        // $specializationLawyers = $specializations->specializations()->orderBy('experience', 'desc')->paginate(10);
        return view("frontend.lawyers.specializations", compact('specializationLawyers', 'specializationsName'));
    }

    public function courts($slug){
        
        if (Court::where("slug", $slug)->exists()) {
            $courts = Court::where("slug", $slug)->firstOrFail();
            $courtsName = $courts->name;
            $courtLawyers = $courts->courts()->orderBy('experience', 'desc')->paginate(10);
         }else{
            $courtLawyers = Court::where("slug", $slug)->paginate(10);
            $courtsName = $slug;
         }

        // $courts = Court::where("slug", $slug)->firstOrFail();
        // $courtLawyers = $courts->courts()->orderBy('experience', 'desc')->paginate(10);

        return view("frontend.lawyers.courts", compact("courtLawyers", "courtsName"));
    }
}
