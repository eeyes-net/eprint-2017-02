<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        if (Auth::attempt(request(['username', 'password']))) {
            return redirect(route('home'));
        }
        return back()->withErrors(['用户名或密码错误']);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
