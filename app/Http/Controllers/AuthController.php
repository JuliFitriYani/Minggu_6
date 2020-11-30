<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
	

	function showLogin()
    {
        return view('login');
    }
    function loginProcess()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            return  redirect('admin')->with('success', 'Login sukses');
        } else {
            return back()->with('danger', "Login Gagal cek Kembali");
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('admin');
    }
    function register()
    {
        $user = new User;
        $user->nama = request('nama');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();
        return redirect('register')->with('success', 'Registrasi Berhasil');
    }

    function forgotPassword()
    {
    }
}