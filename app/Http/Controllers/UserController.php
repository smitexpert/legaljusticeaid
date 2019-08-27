<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserRole;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    
    public function index()
    {
        $allUsers = User::all();
        $terminatedUser = User::onlyTrashed()->get();
        return view('backend.user', compact('allUsers', 'terminatedUser'));
    }

    public function terminate($id){
        User::findOrFail($id)->delete();
        return back()->with('terminate', 'Successfully Terminated!');
    }

    public function edit($id){
        $userId = User::findOrFail($id);
        $userRoles = UserRole::all();
        return view('backend.user.edit', compact("userId", 'userRoles'));
    }

    public function add()
    {
        
        $userRoles = UserRole::all();
        return view('backend.user.add', compact('userRoles'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'user_role' => 'required',
        ]);

        User::findOrFail($request->id)->update([
            'name' => $request->name,
            'user_role' => $request->user_role,
        ]);

        return back()->with('update', 'User Updated!');
    }

    public function addNew(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'user_role' => 'required',
        ]);
        
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role' => $request->user_role,
        ]);

        return back()->with('status', 'User Created Successfully');

    }

    function restore($id){
        User::withTrashed()->where("id", $id)->restore();
        return back()->with('terminate', 'User Restored Successfully!');
    }

    function delete($id){
        User::onlyTrashed()->where("id", $id)->forceDelete();
        return back()->with('deleted', 'User Deleted Successfully!');
    }
}
