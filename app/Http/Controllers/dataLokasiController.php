<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alternatif;
use DB;

class dataLokasiController extends Controller
{
    //
    public function lokasi()
    {
        $alter=alternatif::all();
        // dd($alter);
        return view('Map.map',compact('alter'));
        // return view ('Map.map');
    }

    public function tampilmarker(){
		$array=array();
		$i=0;

        // $query = DB::table('sekolah')->select('*')->get();

        $query = DB::table('sekolah')
        ->join('bantuan','sekolah.id', '=','bantuan.sekolah_id')
        ->join('alternatif','bantuan.id', '=', 'alternatif.bantuan_id')
        ->get();
        
     

        // dd($query);
		foreach($query as $row){
			$array[$i] = array(
				"Id"=>$row->id,
				"nama_sekolah"=>$row->nama_sekolah,
				"Latitude"=>$row->lintang,
				"Longitude"=>$row->bujur, 
                "NPSN"=>$row->NPSN,
                "jenjang_pendidikan"=>$row->jenjang_pendidikan,
                "status_sekolah"=>$row->status_sekolah,
				"alamat"=>$row->alamat,
				"kec"=>$row->kecamatan,
                "kab_kota"=>$row->kabupaten,
                "bantuan"=>$row->bantuan,
                "no_telpon"=>$row->no_telpon,
                "alternatif_id"=>$row->id,
                "distribusi"=>$row->distribusi,
			);
			$i++;
        }    	
        
        // dd($query);
        echo json_encode($array);

       
    }

   
    public function detail_sekolah($nama_sekolah){
        // echo $nama_sekolah;
        // $sekolah = DB::table('sekolah')->select()->where('nama_sekolah', $nama_sekolah)->first();
        
        

        $sekolah = DB::table('sekolah')
        ->join('bantuan','sekolah.id', '=','bantuan.sekolah_id')
        ->join('alternatif','bantuan.id', '=', 'alternatif.bantuan_id')
        ->select()
        ->where(
            'nama_sekolah',$nama_sekolah
            )
            
        ->first();
        // dd($sekolah);

        return view('Map/map2', compact('sekolah'));
    }

    public function ubahStatus(Request $request)
    {
        // dd($request);
        
        $alter_ganti=alternatif::findOrFail($request->ket);
        // dd($alter_ganti);
        $alter_ganti->update($request->all());
        return back();
        // dd($alter_ganti);
        // return ('ubah statusss');

    }

   
    

}
