<?php

namespace App\Http\Controllers\Home;

class MessageController extends Controller
{
    public function index()
    {
        $messages = auth()->user()->messages()->latest()->paginate();
        return view('home.message.index', compact('messages'));
    }
}
