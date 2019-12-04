<?php

namespace App\Http\Controllers;

use App\Lawyer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class LawyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $allData = Lawyer::all();
        return view('backend.lawyers', compact('allData'));
    }

    public function add()
    {
        return view('backend.lawyers.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:lawyers,email',
            'phone' => 'required|unique:lawyers,phone',
            'location' => 'required',
            'experience' => 'required',
            'gender' => 'required',
            'description' => 'required',
        ]);

        $lastId = Lawyer::insertGetId([
            'name' => $request->name,
            'slug' => Slug::slug($request->name, '-'),
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'experience' => $request->experience,
            'gender' => $request->gender,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        Lawyer::findOrFail($lastId)->update([
            'slug' => Slug::slug($request->name." ".$lastId, '-'),
        ]);

        if($request->hasFile('picture')){
            $photo = $request->picture;
            $getExtension = $photo->getClientOriginalExtension();
            $fileName = $lastId.".".$getExtension;
            Image::make($photo)->resize(400, 400)->save(base_path("public/uploaded/lawyer_images")."/".$fileName);
            Lawyer::findOrFail($lastId)->update([
                'picture' => $fileName,
            ]);

        }

        
        return back()->with('status', 'Lawyer Created Successfully');
    }

    public function delete($id)
    {
        Lawyer::findOrFail($id)->delete();
        return back()->with('message', 'Lawyer Delete Successfully');
    }

    public function trush()
    {
        $delData = Lawyer::onlyTrashed()->get();
        return view("backend.lawyers.trush", compact('delData'));
    }

    public function remove($id)
    {
        Lawyer::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('message', 'Lawyer Removed Successfully!');
    }

    public function restore($id)
    {
        Lawyer::onlyTrashed()->where('id', $id)->restore();
        return back()->with('message', 'Lawyer Restored Successfully!');
    }

    

    public function ratings($id){
        $law = Lawyer::findOrFail($id);
        $avg = $law->ratings->avg('ratings');
        $main = (int) $avg;
        $last = 5;
        $star = 0;
        $mid = 0;

        $string = "";

        if($main < $avg){
            $star = $main;
            $mid++;
        }else{
            $star = $main;
        }

        while($star > 0){
            $string .= '<li><i class="fa fa-star"></i></li>';
            $star--;
            $last--;
        }

        if($mid == 1){
            $string .= '<li><i class="fa fa-star-half-o"></i></li>';
            $last--;
        }

        while($last > 0){
            $string .= '<li><i class="fa fa-star-o"></i></li>';
            $last--;
        }
        return $string;
    }

    public function view($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        $rating = $this->ratings($id);
        return view('backend.lawyers.view', compact('lawyer', 'rating'));
    }

    public function edit($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        return view('backend.lawyers.edit', compact('lawyer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:lawyers,email,$id",
            'phone' => "required|unique:lawyers,phone,$id",
            'location' => 'required',
            'experience' => 'required',
            'gender' => 'required',
            'description' => 'required',
        ]);

        Lawyer::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => Slug::slug($request->name." ".$id, '-'),
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'experience' => $request->experience,
            'gender' => $request->gender,
            'description' => $request->description,
        ]);

        if($request->hasFile('picture')){
            if(Lawyer::findOrFail($id)->picture == "default.png"){
                $photo = $request->picture;
                $getExtension = $photo->getClientOriginalExtension();
                $fileName = $id.".".$getExtension;
                Image::make($photo)->resize(400, 400)->save(base_path("public/uploaded/lawyer_images")."/".$fileName);
                
                Lawyer::findOrFail($id)->update([
                    'picture' => $fileName,
                ]);
            }else{
                $photo = $request->picture;
                $getExtension = $photo->getClientOriginalExtension();
                $fileName = $id.".".$getExtension;
                Storage::delete(base_path("public/uploaded/lawyer_images")."/".$fileName);
                Image::make($photo)->resize(400, 400)->save(base_path("public/uploaded/lawyer_images")."/".$fileName);
                
                Lawyer::findOrFail($id)->update([
                    'picture' => $fileName,
                ]);
            }
        }

        return back()->with('status', 'Lawyer Successfully Updated!');
    }
}
