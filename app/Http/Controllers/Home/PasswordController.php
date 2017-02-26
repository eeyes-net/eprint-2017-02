<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

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
