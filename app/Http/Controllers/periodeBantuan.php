<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_periode;
use DB;

class periodeBantuan extends Controller
{
    //

    public function tampilperiode()
    {
        $dataPeriodeTabel = DB::table('data_periode')->get();

        // dd($dataPeriodeTabel);
        return view('Periode.dataPeriode',compact('dataPeriodeTabel'));
    }

    public function tampilEdit ($id)
    {
        $dataPeriodeTabel = DB::table('data_periode')->where('id',$id)->first();
        // dd($dataPeriodeTabel);
        return view('Periode.editStatus',compact('dataPeriodeTabel'));
    }

    public function updatedata ($id, Request $request)
    {
       
        DB::table('data_periode')
            ->where('id', $id)
            ->update(['status' => $request->get('status')]);

        return redirect('admin/periode')->with('status', 'data berhasil diubah!');
    }

    public function hapusdata ($id)
    {

        DB::table('data_periode')->where('id',$id)->delete();
        
        return redirect('admin/periode')->with('status', 'data berhasil dihapus!');
    }

    public function tambahdata (Request $request)
    {
        DB::table('data_periode')->insert([
            'nama_periode' => $request->nama,
            'tahun' => $request->tahun,
            'status' => $request->status,
        ]);

        return redirect('admin/periode')->with('status', 'data berhasil ditambah!');
    }

}
