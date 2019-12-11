<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Slug;
use App\Service;
use App\ServiceCategory;
use App\ServicePostCategory;
use App\ServiceTag;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LegalServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $services = Service::all();
        return view('backend.services.index', compact('services'));
    }

    public function addNew(){
        $categories = ServiceCategory::all();
        return view('backend.services.add', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'name' => 'required|unique:services',
            'description' => 'required',
            'category' => 'required',
            'tags' => 'required'
        ]);

        $slug = Slug::slug($request->name);

        $service_id = Service::insertGetId([
            'title' => $request->title,
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        Service::find($service_id)->update([
            'slug' => $slug.'-'.$service_id
        ]);

        foreach($request->tags as $tag){
            $tags[] = [
                'service_id' => $service_id,
                'tag' => $tag,
                'slug' => Slug::slug($tag),
                'created_at' => Carbon::now()
            ];
        }
        
        ServiceTag::insert($tags);
        ServicePostCategory::create([
            'service_id' => $service_id,
            'service_categorie_id' => $request->category
        ]);

        return back()->with('status', 'Service Was Successfully Published!');
    }

    public function edit($id){
        $service = Service::findOrFail($id);
        $categories = ServiceCategory::all();
        // return $service->category;
        return view('backend.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        ServiceTag::where('service_id', $id)->delete();

        $slug = Slug::slug($request->name);
        Service::find($id)->update([
            'title' => $request->title,
            'name' => $request->name,
            'slug' => $slug.'-'.$id,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        foreach($request->tags as $tag){
            $tags[] = [
                'service_id' => $id,
                'tag' => $tag,
                'slug' => Slug::slug($tag),
                'created_at' => Carbon::now()
            ];
        }
        
        ServiceTag::insert($tags);
        ServicePostCategory::where('service_id', $id)->update([
            'service_categorie_id' => $request->category
        ]);

        return back()->with('status', 'Service Was Successfully Updated!');
    }

    public function destroy($id){
        Service::find($id)->delete();
        return back()->with('status', 'Service Was Successfully Deleted!');
    }

    public function trash(){
        $services = Service::onlyTrashed()->get();
        return view('backend.services.trash', compact('services'));
    }

    public function delete($id){
        Service::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('status', 'Service Removed Successfully!');
    }

    public function restore($id){
        Service::onlyTrashed()->where('id', $id)->restore();
        return back()->with('status', 'Service Restored Successfully!');
    }
}
