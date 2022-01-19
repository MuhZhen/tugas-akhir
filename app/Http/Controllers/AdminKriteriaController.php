<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kriteria;
use DB;

class AdminKriteriaController extends Controller
{
    //
    public function TampilkanKriteria()
    {
        
        $kriterias=kriteria::paginate();
        // return $kriterias;
        return view('Admin.AdminAturKriteria',compact('kriterias'));
        // return view ('Admin.AdminAturKriteria');
    }

    public function TampilkanTambah()
    {
        return view('Admin.AdminTambahKriteria');
    }

    public function TambahDataKriteria(Request $request)
    {
        // return $request;
        $validation = $request->validate([
            'nama'=>'required',
            'bobot'=>'required|numeric|between:0,99.99',
            'Atribut'=>'required'
            ],
            [
                'nama.required'=>'Nama Tidak Boleh Kosong!',
                'bobot.required'=>'Bobot Tidak Boleh Kosong!',
                'bobot.numeric'=>'Bobot dalam bentuk angka!',
                'Atribut.required'=>'Masukan Data Atribut!',
            ]
        );

        $kriteria= new kriteria;
        $kriteria->nama =$request->nama;
        $kriteria->bobot =$request->bobot;
        $kriteria->atribut =$request->Atribut;
        $kriteria->save();

        return redirect('/admin/atur/kriteria')->with('status', 'data berhasil ditambah!');
        
    }

    

    public function TampilEditKriteria($id)
    {
        $EditTampil = DB::table('kriteria')->where('id',$id)->first();
        return view('Admin.AdminEditKriteria',['EditTampil'=> $EditTampil]);
    }

    public function UpdateKriteria($id, Request $request)
    {
        // return  $request->all();

        $validation = $request->validate([
            'nama'=>'required',
            'bobot'=>'required|numeric|between:0,99.99',
            'Atribut'=>'required'
            ],
            [
                'nama.required'=>'Nama Tidak Boleh Kosong!',
                'bobot.required'=>'Bobot Tidak Boleh Kosong!',
                'bobot.numeric'=>'Bobot dalam bentuk angka!',
                'Atribut.required'=>'Masukan Data Atribut!',
            ]
        );

        kriteria::findOrfail($id)->update([
            'nama'=>$request->get('nama'),
            'bobot'=>$request->get('bobot'),
            'atribut'=>$request->get('Atribut'),
        ]);

        return redirect('/admin/atur/kriteria')->with('status', 'data berhasil diubah!');
    }

    public function HapusKriteria($id)
    {
        DB::table('kriteria')->where('id',$id)->delete();
        return redirect('/admin/atur/kriteria')->with('status', 'data berhasil dihapus!');
        // return "hapuss";
    }
}
