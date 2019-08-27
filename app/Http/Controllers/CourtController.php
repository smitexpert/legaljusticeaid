<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Court;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CourtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $courtList = Court::all();
        $deletedList = Court::onlyTrashed()->get();
        return view('backend.courts', compact('courtList', 'deletedList'));
    }
    
    public function add(Request $request){
        $request->validate([
            'courts' => 'required|unique:courts,name',
        ]);

        Court::insert([
            'name' => $request->courts,
            'slug' => Str::slug($request->courts, '-'),
            'created_at' => Carbon::now(),
        ]);

        return back()->with('status', 'New Court Add Successfully!');
    }

    public function delete($id){
        Court::findOrFail($id)->delete();
        return back()->with('message', 'Court Deleted Successfully!');
    }

    public function restore($id){
        Court::onlyTrashed()->where('id', $id)->restore();
        return back()->with('message', 'Court Restore Successfully!');
    }

    public function remove($id){
        Court::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('message', 'Court Delete Successfully!');
    }

    public function edit($id){
        $courts = Court::findOrFail($id);
        return view('backend.courts.edit', compact('courts'));
    }

    public function update(Request $request){
        $request->validate([
            'id' => 'required',
            'courts' => "required|unique:courts,name,$request->id",
        ]);

        Court::findOrFail($request->id)->update([
            'name' => $request->courts,
            'slug' => Str::slug($request->courts, '-'),
        ]);

        return back()->with('status', 'Name Update Successfully!');
    }
}
