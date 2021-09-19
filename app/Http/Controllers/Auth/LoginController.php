<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {

        $this->data['headline'] = "Log in";
        return view('login.form', $this->data);
    }

    public function authenticate(LoginRequest $request)
    {

        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {

            return redirect('/');
        } else {

            return redirect()->route('login')->withErrors(['Invalid Credintials']);
        };
    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('login');
    }
}
