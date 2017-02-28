<?php

namespace App\Http\Controllers\Home;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('home.password.edit');
    }

    public function update()
    {
        return request();
    }
}
