<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kriteria;
use App\sekolah;
use App\bantuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class dashboardSekolah extends Controller
{
    //
    public function tampilkanDashboard()
    {
        // $sekolah = DB::table('bantuan')->select('bantuan')->where('sekolah_id', auth()->user()->id)->first();
        
        $alternatif= DB::table('alternatif')->first();
        // dd($alternatif);
       
        if($alternatif == null){
            return view('Error.kosong');
        }
        
        else {
        
        $cari_periode = DB::table('alternatif')
                        ->join('bantuan','alternatif.bantuan_id','=','bantuan.id')
                        ->select('alternatif.*','bantuan.id','bantuan.periode')
                        ->where('bantuan.sekolah_id',auth()->user()->id)
                        ->pluck('bantuan.periode');
        // dd($cari_periode);

        $sekolah = DB::table('bantuan')
            ->join('data_periode', 'bantuan.periode', '=', 'data_periode.id')
            ->join('alternatif','bantuan.id','=','alternatif.bantuan_id')
            ->select('bantuan.*','alternatif.verifikasi', 'data_periode.nama_periode', 'data_periode.status')
            ->where('sekolah_id', auth()->user()->id)
            ->where('periode',$cari_periode)
            ->first();

            
            
        $data_periode = DB::table('data_periode')
        ->get();

        
         

        return view('inputSekolah.dashboard', compact('sekolah','data_periode'));

        }
        
        // return view ('inputSekolah.dashboard');
    }

    public function atur()
    {
        // $sekolah= auth()->user()->id;
        // $editPassword = DB::table('sekolah')->where('id',$sekolah)->first();
        // dd($editPassword);
        return view ('inputSekolah.atur');
    }

    public function simpanPassword(Request $request)
    {
        $sekolah= auth()->user()->id;
        $validation = $request->validate([
            'password'=>'required'
            ],
            [
                'password.required'=>'Passoword Tidak Boleh Kosong!',
            ]
        );

        sekolah::findOrfail($sekolah)->update([
            'password'=>Hash::make($request->get('password'))
        ]);

      
        return redirect('/kondisi-sekolah/pengaturan')->with('status', 'Password Berhasil di ubah!');
    }
    

    public function tambahdata(Request $request)
    {
        // return "yeh";
        $dapat=$request->cari_periode;
        // dd($dapat);

        DB::table('bantuan')
              ->where('sekolah_id', auth()->user()->id)
              ->where('periode',$dapat)
              ->update([     
                'periode' => $request->cari_periode, 
                'bantuan' => $request->bantuan,
                
            
            ]);

   

        return redirect('/kondisi-sekolah')->with('status', 'data berhasil ditambah!');

    }

    
}
