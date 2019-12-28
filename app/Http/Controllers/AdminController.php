<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
      if(Auth::user()->user_role <= 4){
        return view('backend.dashboard');
      }else{
        return redirect('me');
        // view('me.index');
        // return view('backend.dashboard');
      }
      
    }

}
