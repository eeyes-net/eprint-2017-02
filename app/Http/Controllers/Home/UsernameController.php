<?php

namespace App\Http\Controllers\Home;

class UsernameController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('home.username.index', compact('user'));
    }

    public function sendToOld()
    {
        return request();
    }

    public function update()
    {
        return request();
    }
}
