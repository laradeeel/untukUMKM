<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function showProfileForm()
    {
        if (auth()->user()) {
            return view('profil', [
                'title' => 'Profil'
            ]);
        } else {
            return redirect('login');
        }
    }
    public function profil(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:users',
            'email' => 'required|email|unique:users',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.unique' => 'Nama sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'email sudah digunakan.',
        ]);

        $user = Auth::user();
        // dd($user);
        $user->fill($request->only([
            'nama', 'email',
        ]));
        $user->save();
        return redirect('home')->with('success', 'Profile Anda Sudah Di Perbaharui');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
            'reenter_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Password Wajib Diisi',
            'new_password.required' => 'Password Baru Wajib Diisi',
            'reenter_password.required' => 'Password Baru Wajib Diisi',
            'new_password.min' => 'Password Baru Minimal 6 Digit',
            'reenter_password.same' => 'Password Tidak Sama',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect('home')->with('success', 'Password Anda Berhasil Diperbaharui');
    }
}
