<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('home.info.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('home.info.edit', compact('user'));
    }

    public function update()
    {
        $user = auth()->user();
        $user->name = request('name');
        $user->save();
        $user->setMeta('contact', request('contact'));
        return redirect(action('Home\\InfoController@index'));
    }
}
