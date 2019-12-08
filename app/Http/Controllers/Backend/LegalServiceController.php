<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegalServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.services.index');
    }

    public function addNew(){
        return view('backend.services.add');
    }
}
