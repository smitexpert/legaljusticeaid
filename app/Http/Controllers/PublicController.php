<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    //

    public function sites($view)
    {
        $view->with('siteName', "Legal Justice Aid");
    }
}
