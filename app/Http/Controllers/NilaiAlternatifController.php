<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alternatif;
use App\kriteria;
use App\sub_kriteria;
use App\nilai_alternatif;
use DB;


class NilaiAlternatifController extends Controller
{
    //
    public function EditNilaiAlternatif($id)
    {

        $selectedSub = DB::table('nilai_alternatif')
                            ->select('sub_id')
                            ->where('alternatif_id',$id)
                            ->get();
        // return $selectedSub;
        $EditTampilAlternatif = alternatif::find($id);
        // dd($EditTampilAlternatif);
        $kriteria = kriteria::all();
        $arraySub = [];
        foreach ($selectedSub as $a) {
                $arraySub[] = $a->sub_id;
        }
        return view('Admin.AdminEditNilaiAlternatif',[
            'master_kriteria'   => $kriteria,
            'master_alternatif'=>$EditTampilAlternatif,
            'selected_sub'     => $arraySub
        ]);



        // $EditTampilSubKriteria = nilai_alternatif::find($id);
        // $kriteria = kriteria::all();
        // // return $EditTampilSubKriteria;
        // return view('Admin.AdminEditNilaiAlternatif',['master_kriteria' => $kriteria], compact('EditTampilSubKriteria'));

        // return view('Admin.AdminEditSubKriteria',Compact('EditTampilSubKriteria','tampilkriteria'));
    }

    public function UpdateNilaiAlternatif(Request $request, $id)
    {
        // $validation = $request->validate([
        //     '{{$krit->id}}' => 'required'
        // ]);


        $data = array_values($request->except('_token'));
        //        $data = Crip::find($data);
                $alternatif = alternatif::find($id);
                $alternatif->subkriteria()->sync($data);
                return redirect(route('tambah.alternatif'))->with('status', 'data berhasil disimpan!');
               
    }

    

    public function TambahNilaiAlternatif($id)
    {
        $kriteria = kriteria::all();
        return view('Admin.AdminNilaiAlternatif',['master_kriteria' => $kriteria]);
        // return $kriteria;
        // $sub_kriteria = sub_kriteria::all();
        // // return view ('Admin.AdminNilaiAlternatif',['master_kriteria'=>$kriteria]);
        // return view('Admin.AdminNilaiAlternatif',Compact('kriteria','sub_kriteria'));
    }

    public function SimpanNilai(Request $request,$id)
    {
        $data = array_values($request->except('_token'));
//        $data = Crip::find($data);
        $alternatif = alternatif::find($id);
        // return $alternatif;
        $alternatif->subkriteria()->sync($data);
        return redirect(route('tambah.alternatif'))->with('status', 'data berhasil disimpan!');;
    }

}
