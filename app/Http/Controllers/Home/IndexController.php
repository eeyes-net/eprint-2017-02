<?php

namespace App\Http\Controllers\Home;

class IndexController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
