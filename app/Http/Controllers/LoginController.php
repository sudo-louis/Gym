<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {

    public function __construct() {
        // Agrega encabezados para evitar el caché
        $this->middleware(function ($request, $next) {
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Pragma: no-cache");
            header("Expires: 0");
            return $next($request);
        });
    }

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
            return redirect('/');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}