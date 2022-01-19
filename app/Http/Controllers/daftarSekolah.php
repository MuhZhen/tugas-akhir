<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;
use Illuminate\Support\Facades\Hash;

class daftarSekolah extends Controller
{
    //
    public function tambahdata (Request $request)
    {
        // return "berhasil";
        $validation = $request->validate([
            'nama'=>'required',
            'npsn'=>'required',
            'jpendidikan'=>'required',
            'ssekolah'=>'required',
            'alamat'=>'required',
            'kecamatan'=>'required',
            'kabupaten'=>'required',
            'lintang'=>'required',
            'bujur'=>'required',
            'ntelpon'=>'required',
            'password'=>'required'
            ],
            [
                'nama.required'=>'Nama Sekolah Tidak Boleh Kosong!',
                'npsn.required'=>'NPSN Tidak Boleh Kosong!',
                'jpendidikan.required'=>'Jenjang Pendidikan Tidak Boleh Kosong!',
                'status Sekolah.required'=>'Status Sekolah Tidak Boleh Kosong!',
                'alamat.required'=>'Alamat Tidak Boleh Kosong!',
                'kecamatan.required'=>'Kecamatan Tidak Boleh Kosong!',
                'kabupaten.required'=>'Kabupaten Tidak Boleh Kosong!',
                'lintang.required'=>'Lintang Tidak Boleh Kosong!',
                'bujur.required'=>'Bujur Tidak Boleh Kosong!',
                'ntelpon.required'=>'Nomor Telpon Tidak Boleh Kosong!',
                'password.required'=>'Passoword Tidak Boleh Kosong!',
            ]
        );

        $sekolah= new sekolah;
        $sekolah->nama_sekolah =$request->nama;
        $sekolah->NPSN =$request->npsn;
        $sekolah->jenjang_pendidikan =$request->jpendidikan;
        $sekolah->status_sekolah =$request->ssekolah;
        $sekolah->alamat =$request->alamat;
        $sekolah->kecamatan =$request->kecamatan;
        $sekolah->kabupaten =$request->kabupaten;
        $sekolah->lintang =$request->lintang;
        $sekolah->bujur =$request->bujur;
        $sekolah->no_telpon =$request->ntelpon;
        $sekolah->password =Hash::make($request->password);
    
        $sekolah->save();

        return redirect('login-sekolah')->with('status', 'data berhasil ditambah!');
            

    }
}
