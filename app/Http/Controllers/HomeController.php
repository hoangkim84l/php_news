<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // $phoBien = Chapter::orderBy('id', 'desc')->limit(10)->get();
        // $phoBien->load('story');
        return view('layouts.home.home', compact(''));
    }
}
