<?php

namespace App\Http\Controllers;

use App\Specialization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpecializationController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $allData = Specialization::all();
        $delData = Specialization::onlyTrashed()->get();
        return view('backend.specialization', compact('allData', 'delData'));
      }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:specializations,name',
        ]);

        Specialization::insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'created_at' => Carbon::now(),
        ]);

        return back()->with('status', 'Specialization Created Successfully!');
    }

    public function delete($id)
    {
        Specialization::findOrFail($id)->delete();
        return back()->with('message', 'Specializatoin Deleted Successfully!');
    }

    public function restore($id)
    {
        Specialization::onlyTrashed()->where('id', $id)->restore();
        return back()->with('message', 'Specializatoin Restored Successfully!');
    }

    public function remove($id)
    {
        Specialization::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('message', 'Specializatoin Removed Successfully!');
    }

    public function edit($id)
    {
        $specialization = Specialization::findOrFail($id);
        return view('backend.specialization.edit', compact('specialization'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => "required|unique:specializations,name,$request->id",
        ]);

        Specialization::findOrFail($request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return back()->with('status', 'Specialization Updated!');
    }
}
