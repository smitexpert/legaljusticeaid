<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceCategory;

class ServiceController extends Controller
{
    public function index(){
        $categories = ServiceCategory::with('services')->get();
        return view('frontend.services.index', compact('categories'));
    }

    public function single($slug){
        $service = Service::where('slug', $slug)->FirstOrFail();
        return view('frontend.services.single', compact('service'));
    }
}
