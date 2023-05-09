<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function resetName() {
        return view('edit.resetName');
    }

    public function resetUserName() {
        return view('edit.resetUserName');
    }

    public function resetEmail() {
        return view('edit.resetEmail');
    }

    public function resetPassword() {
        return view('edit.resetPassword');
    }

    public function storeName(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user->update([
            'name' => $request->name,
        ]);

        event(new Registered($user));

        return view('responses.createduser', ['user' => $user]);
    }
}
