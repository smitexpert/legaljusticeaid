<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationReadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read(Request $request){
        $user = User::find($request->userid);
        $user->unreadNotifications->markAsRead();
    }
}
