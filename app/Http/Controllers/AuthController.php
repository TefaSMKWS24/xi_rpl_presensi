<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function LoginSiswa(Request $request)
    {
    if (Auth::guard('siswa')->attempt([
        'nis' => $request->nis,
        'password' => $request->password
    ]))
    {
        dd('Berhasil: '. Auth::guard('siswa')->user());
        Log::info('Login successful');
        //return redirect('/user/dashboard');
    }
        else{
            echo"Login Gagal";
            //return redirect('/user');->with('warning','nis / password salah');
    }
    }
    public function Logoutsiswa()
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
            return redirect('/user');
        }

    }
public function LoginGuru(Request $request)
    {
    if (Auth::guard('guru')->attempt([
        'nik' => $request->nik,
        'password' => $request->password
    ]))
    {
        dd('Berhasil: '. Auth::guard('guru')->user());
        Log::info('Login successful');
        //return redirect('/user/dashboard');
    }
        else{
            echo"Login Gagal";
            //return redirect('/user');->with('warning','nik / password salah');
    }
    }
    public function LogoutGuru()
    {
        if (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
            return redirect('/user');
        }

    }
    public function LoginAdmin(Request $request)
    {
    if (Auth::guard('admin')->attempt([
        'username' => $request->username,
        'password' => $request->password
    ]))
    {
        dd('Berhasil: '. Auth::guard('siswa')->user());
        Log::info('Login successful');
        //return redirect('/user/dashboard');
    }
        else{
            echo"Login Gagal";
            //return redirect('/user');->with('warning','nis / password salah');
    }
    }
    public function Logoutadmin()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect('/user');
        }

    }

}
