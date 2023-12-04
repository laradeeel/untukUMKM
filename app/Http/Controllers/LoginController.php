<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        Session::flash('email', $request->email); // ketika login value form tidak akan hilang jika gagal

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $credentials = $request->only('email', 'password');

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            return redirect('home')->with('success', 'Kamu Berhasil Login');
        } else {
            return redirect('login')->with('failed', 'Email tau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Kamu Berhasil Logout');
    }
}
