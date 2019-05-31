<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Homepage Controller
    public function index()
    {
        return view('homepage');
    }
}
