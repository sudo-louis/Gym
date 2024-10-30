<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {

    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            //"active" => true
        ];
        $remember = ($request->has('remember')?true:false);

        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('indexadmin'));
        } else {
            return redirect('/login/login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}