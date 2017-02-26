<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('auth.password');
    }

    public function update()
    {
        // /** @type User $user */
        // $user = Auth::user();
        // if (!Auth::attempt([
        //     'username' => $user->username,
        //     'password' => request('password'),
        // ])) {
        //     return back()->withErrors([
        //         '密码不正确',
        //     ]);
        // }
        // $user->forceFill([
        //     'password' => bcrypt(request('password'))
        // ]);
        return redirect(route('home'));
    }
}
