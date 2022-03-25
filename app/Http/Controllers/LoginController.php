<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function loginproses(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return redirect('/login')->with('error', 'login failed!');
    }

    public function register()
    {
        return view('register');
    }
    public function registeruser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData, [
            'remember_token' => Str::random(60)
        ]);

        return redirect('/login')->with('success', 'Registration successfull, please login!');
    }
}
