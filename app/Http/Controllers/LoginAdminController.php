<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class LoginAdminController extends Controller
{
    //

    public function TampilkanLogin()
    {
        return view ('Admin.LoginAdmin');
    }

    public function TampilkanAdmin()
    {   
        $sudah = DB::table('alternatif')->select('id')->where('distribusi', 'Tersalurkan')->get()->count();
        $belum = DB::table('alternatif')->select('id')->where('distribusi', 'Belum Tersalurkan')->get()->count();
        return view ('Admin.AdminBeranda', compact('belum', 'sudah'));
    }

    public function postLogin(Request $request)
    {
        // dd($request->all());

        $verifikasi="Relawan Verifikasi";
       

        
        if(Auth::guard('pengguna')->attempt(['username' => $request->username,'password' => $request->password, 'level_akses'=>$verifikasi])){
            return redirect ('admin/atur/alternatif/relawan');
        }

        else if(Auth::guard('pengguna')->attempt(['username' => $request->username,'password' => $request->password])){
            return redirect('/admin-beranda');
        }



        return redirect('/login-admin');


    }

    public function logout()
    {
        Auth::guard('pengguna')->logout();
        return redirect('/login-admin');
    }
}
