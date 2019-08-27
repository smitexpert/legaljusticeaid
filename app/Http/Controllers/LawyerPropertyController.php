<?php

namespace App\Http\Controllers;

use App\Court;
use App\Lawyer;
use App\LawyerCourt;
use App\LawyerPracticeAreas;
use App\LawyerRatings;
use App\LawyerSpecializations;
use App\PracticeArea;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LawyerPropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $lawyerId = $id;
        $courts = Court::all();
        $specializations = Specialization::all();
        $practiceAreas = PracticeArea::all();
        return view("backend.lawyers.property", compact('lawyerId', 'courts', 'specializations', 'practiceAreas'));
    }

    public function update(Request $request, $id)
    {
        LawyerCourt::where('lawyers_id', $id)->delete();
        LawyerPracticeAreas::where('lawyers_id', $id)->delete();
        LawyerSpecializations::where('lawyers_id', $id)->delete();

        $courts = $request->courts;
        $specializations = $request->specializations;
        $practiceareas = $request->practiceareas;

        

        if(is_array($courts)){
            foreach($courts as $court){
                LawyerCourt::insert([
                    'lawyers_id' => $id,
                    'courts_id' => $court,
                ]);
            }
        }

        if(is_array($specializations)){
            foreach($specializations as $specialization){
                LawyerSpecializations::insert([
                    'lawyers_id' => $id,
                    'specializations_id' => $specialization,
                ]);
            }
        }

        if(is_array($practiceareas)){
            foreach($practiceareas as $practicearea){
                LawyerPracticeAreas::insert([
                    'lawyers_id' => $id,
                    'practice_areas_id' => $practicearea,
                ]);
            }
        }

        return back()->with('status', 'Properties Updated');
    }
}
