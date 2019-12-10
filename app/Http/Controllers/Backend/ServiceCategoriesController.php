<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Slug;
use App\ServiceCategory;

class ServiceCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categories = ServiceCategory::all();
        return view('backend.services.categories.index', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:service_categories'
        ]);

        $slug = Slug::slug($request->name);

        ServiceCategory::create([
            'name' => $request->name,
            'slug' => $slug
        ]);

        return back()->with('status', 'Service Category Successfully Created!');
    }

    public function edit($id){
        $category = ServiceCategory::findOrFail($id);
        return view('backend.services.categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:service_categories,name,'.$request->name
        ]);

        $slug = Slug::slug($request->name);
        ServiceCategory::find($id)->update([
            'name' => $request->name,
            'slug' => $slug
        ]);
        return back()->with('status', 'Service Category Successfully Updated!');

    }

    public function remove(Request $request, $id){
        ServiceCategory::find($id)->delete();
        return back()->with('status', 'Service Category Successfully Removed!');
    }

    public function trash(){
        $categories = ServiceCategory::onlyTrashed()->get();
        return view('backend.services.categories.trash', compact('categories'));
    }

    public function destory($id){
        ServiceCategory::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('status', 'Service Category Successfully Deleted!');
    }

    public function restore($id){
        ServiceCategory::onlyTrashed()->where('id', $id)->restore();
        return back()->with('status', 'Service Category Successfully Restored!');
    }
}
