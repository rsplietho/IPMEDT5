<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

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

        $user = Auth::user()->update([
            'name' => $request->name,
        ]);

        return view('responses.editeduser', ['user' => Auth::user()]);
    }

    public function storeUserName(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:32|unique:users',
        ]);

        $user = Auth::user()->update([
            'username' => $request->username,
        ]);

        return view('responses.editeduser', ['user' => Auth::user()]);
    }

    public function storeEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = Auth::user()->update([
            'email' => $request->email,
        ]);

        return view('responses.editeduser', ['user' => Auth::user()]);
    }

    public function storePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return view('responses.editeduser', ['user' => Auth::user()]);    }
}
