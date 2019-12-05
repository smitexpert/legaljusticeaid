<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }

    public function loginProcess(Request $request){
        $data = $request->except(['_token']);
        if(auth()->attempt($data)){
            if(Auth::user()->user_role <= 4){
                return redirect('/admin/dashboard');
            }else{
                return 'Basic User';
            }
        }else{
            return back()->with('email', 'Lawyer Created Successfully');
        }
    }

    public function logout(Request $request){
        auth()->logout();
        return redirect()->route('login');
    }
}
