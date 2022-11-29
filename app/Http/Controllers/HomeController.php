<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends Controller
{
    public function viewLanding(Request $request)
    {
        $isLogin = empty($request->cookie('Authorization'));
        return view('landing.index', ["is_login" => $isLogin]);
    }
}