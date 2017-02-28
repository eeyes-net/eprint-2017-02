<?php

namespace App\Http\Controllers\Home\Admin;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('home.admin.users.index', compact('users'));
    }

    public function update($id)
    {
        $user = User::find($id);
        $type = request('type');
        if (!in_array($type, ['admin', 'shop', 'user', 'anonymous'])) {
            return back();
        }
        switch (auth()->user()->type) {
            case 'root':
                if ($user->isRoot()) {
                    return back();
                }
                break;
            case 'admin':
                if ($user->isRoot() || $user->isAdmin() || $type === 'admin') {
                    return back();
                }
                break;
            default:
                return back();
        }
        $user->type = $type;
        $user->save();
        return back();
    }
}
