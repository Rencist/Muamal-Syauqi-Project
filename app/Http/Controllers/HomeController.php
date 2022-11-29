<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function viewLanding()
    {
        return view('landing.index');
    }
}