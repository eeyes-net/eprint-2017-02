<?php

namespace App\Http\Controllers\Home;

class IndexController extends Controller
{
    public function index()
    {
        return redirect(action('Home\UploadController@index'));
        // return view('home.index');
    }
}
