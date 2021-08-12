<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin() {
        $credentials = request()->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('/customers');
        }

        return back()->withInput()->with('message', 'Invalid credentials');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
