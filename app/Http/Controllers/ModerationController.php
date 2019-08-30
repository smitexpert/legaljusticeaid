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
    
    public function remove($id){
        LawyerRatings::findOrFail($id)->delete();
        return redirect('admin/ratings')->with('status', 'Rating Removed successfully!!!');
    }

    public function view($id){
        $rating = LawyerRatings::findOrFail($id);
        // return $rating;
        return view('backend.ratings.view', compact('rating'));
    }

    public function trush(){
        $ratings = LawyerRatings::onlyTrashed()->get();
        return view('backend.ratings.trush', compact('ratings'));
    }

    public function delete($id){
        LawyerRatings::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('status', 'Rating Deleted successfully!!!');
    }

    public function restore($id){
        LawyerRatings::onlyTrashed()->where('id', $id)->restore();
        return back()->with('status', 'Rating Restored successfully!!!');
    }

    public function approve($id){
        LawyerRatings::findOrFail($id)->update([
            'status' => true
        ]);
        return back()->with('status', 'Rating Approved successfully!!!');
    }

    public function disapprove($id){
        LawyerRatings::findOrFail($id)->update([
            'status' => false
        ]);
        return back()->with('status', 'Rating Dispproved successfully!!!');
    }
}
