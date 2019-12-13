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
        $service = Service::with('category')->where('slug', $slug)->FirstOrFail();

        $relateds = Service::whereHas('category', function ($q) use ($service) {
            return $q->whereIn('slug', $service->category->pluck('slug')); 
        })
        ->where('id', '!=', $service->id) // So you won't fetch same post
        ->limit(5)
        ->get();

        return view('frontend.services.single', compact('service', 'relateds'));
    }
}
