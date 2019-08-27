<?php

namespace App\Http\Controllers;

use App\PracticeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PracticeAreaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allData = PracticeArea::all();
        $delData = PracticeArea::onlyTrashed()->get();
        return view('backend.practicearea', compact('allData', 'delData'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:practice_areas,name',
        ]);

        PracticeArea::insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'created_at' => Carbon::now(),
        ]);

        return back()->with('status', 'Practice Area Created Successfully');
    }

    public function delete($id)
    {
        PracticeArea::findOrFail($id)->delete();
        return back()->with('message', 'Practice Area Delete Successfully');
    }

    public function restore($id)
    {
        PracticeArea::onlyTrashed()->where('id', $id)->restore();
        return back()->with('message', 'Practice Area Restore Successfully');
    }

    public function remove($id)
    {
        PracticeArea::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('message', 'Practice Area Remove Successfully');
    }

    public function edit($id)
    {
        $data = PracticeArea::findOrFail($id);
        return view('backend.practicearea.edit', compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => "required|unique:practice_areas,name,$request->id",
        ]);

        PracticeArea::findOrFail($request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return back()->with('status', 'Practice Area Updated');
    }
}
