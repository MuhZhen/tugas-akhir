<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class LoginSekolahController extends Controller
{
    //
    public function TampilkanLogin()
    {
        return view ('inputSekolah.login');
        
    }

    public function tampildaftar()
    {
        return view('inputsekolah.daftar');
    }

    public function postlogin(Request $request)
    {
        // dd($request->all());
        if(Auth::attempt(['NPSN' => $request->username,'password' => $request->password])){
            return redirect('/kondisi-sekolah');
        }

        return redirect('/login-sekolah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login-sekolah');
    }
}