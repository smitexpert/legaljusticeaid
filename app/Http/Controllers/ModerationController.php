<?php

namespace App\Http\Controllers;

use App\Lawyer;
use App\LawyerRatings;
use Illuminate\Http\Request;

class ModerationController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function ratings(){
        $ratings = LawyerRatings::all();
        // return $ratings;
        return view('backend.ratings', compact('ratings'));
    }
}
