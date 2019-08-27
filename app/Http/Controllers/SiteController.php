<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class SiteController extends Controller
{
    //

    public function index(){
        $sites = Site::limit(1)->latest()->first();
        return view("backend.site", compact('sites'));
    }

    public function add(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'phone' => 'required|max:30',
            'email' => 'required|max:30',
            'address' => 'required|max:100',
            'description' => 'required|max:255'
        ]);

        Site::updateOrCreate(
            [
                'slug' => 'mysite'
            ],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'description' => $request->description
            ]
        );
        return back()->with('status', 'Site Settings Updated!');
    }

    public function logo(){
        return view("backend.sites.logo");
    }

    public function headerLogo(Request $request){
        $request->validate([
            'header_logo' => 'required',
        ]);
        
        if($request->hasFile('header_logo')){
            $site = Site::where('slug', 'mysite')->firstOrFail();
            $name = Str::slug($site->name, '-');
            $file = $request->header_logo->getClientOriginalExtension();
            $photo = $request->header_logo;
            $logo = $name.".".$file;
            if($site->logo == "default-logo.jpg"){
                Image::make($photo)->resize(265, 64)->save(base_path("public/uploaded/logo")."/".$logo);
            }else{
                $fileName = $site->logo;
                Storage::delete(base_path("public/uploaded/logo")."/".$fileName);
                Image::make($photo)->resize(235, 64)->save(base_path("public/uploaded/logo")."/".$logo);
            }

            Site::where('slug', 'mysite')->update([
                'logo' => $logo,
            ]);

            return back()->with('status', 'Header Logo Upload Successfully');

        }else{
            return back()->with('error', 'Header Logo Not Uploaded');
        }
    }

    public function footerLogo(Request $request){
        $request->validate([
            'footer_logo' => 'required',
        ]);
        
        if($request->hasFile('footer_logo')){
            $site = Site::where('slug', 'mysite')->firstOrFail();
            $name = Str::slug("footer ".$site->name, '-');
            $photo = $request->footer_logo;
            $file = $photo->getClientOriginalExtension();
            $logo = $name.".".$file;
            if($site->footer_logo == "default-footer-logo.jpg"){
                Image::make($photo)->resize(235, 64)->save(base_path("public/uploaded/logo")."/".$logo);
            }else{
                $fileName = $site->footer_logo;
                Storage::delete(base_path("public/uploade/logo")."/".$fileName);
                Image::make($photo)->resize(235, 64)->save(base_path("public/uploaded/logo")."/".$logo);
            }

            Site::where('slug', 'mysite')->update([
                'footer_logo' => $logo,
            ]);

            return back()->with('status', 'Footer Logo Upload Successfully');

        }else{
            return back()->with('error', 'Footer Logo Not Uploaded');
        }
    }
}
