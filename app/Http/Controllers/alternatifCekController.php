<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alternatif;
use App\kriteria;
use App\bantuan;
use App\sekolah;
use App\nilai_alternatif;
use DB;


class alternatifCekController extends Controller
{
    public function TampilkanAlternatif(Request $req)
    {
  
        // $TampilAlternatif = alternatif::paginate(10);
        // return $alternatif;
        // return view("Admin.AdminAturAlternatif");
        // return view('Admin.AdminAturAlternatif',compact('TampilAlternatif'));

        
        $alter = DB::table('alternatif')->where('verifikasi', 'Sudah Terverifikasi')->first();

        $alternatif_data=alternatif::all();

        $jumlah=count($alternatif_data);

      
       
        $TampilAlternatif=alternatif::paginate($jumlah);
        // dd($TampilAlternatif);

        

            return view('Relawan.cek',compact('TampilAlternatif','alter'));

         
 
        

    }

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
        
        return view('Relawan.edit',[
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

    public function EditNilaiBatalAlternatif(Request $request,$id)
    {
        $data = array_values($request->except('_token'));
        // dd($data);
        
        
      
        
        //        $data = Crip::find($data);
                $alternatif = alternatif::find($id);
                $alternatif->subkriteria()->sync($data);

                $simpan = DB::table('alternatif')
                ->where('id', $id)
                ->update(['Verifikasi' => 'Belum Diverifikasi']);
               
                return redirect(route('nilai.verifikasi'))->with('status', 'data berhasil disimpan!');
    
    }

    public function UpdateNilaiAlternatif(Request $request, $id)
    {
        

        // dd($request);
        // $request->validate([
        //     "_token" => 'required',
        //     '52' => 'required',
        //     '53' => 'required',
        //     '54' => 'required',
        //     '55' => 'required',
        //     '56' => 'required',
        //     '57' => 'required',
        //     '58' => 'required',
        //     '59' => 'required',
        //     '60' => 'required',
        //     '61' => 'required',
        //     '62' => 'required',
        //     '63' => 'required',
        //     '64' => 'required',
            
        //     // tambahkan aturan validasi untuk field lainnya
        // ]);

        
        
        $data = array_values($request->except('_token'));
        // dd($data);
        
        
      
        
        //        $data = Crip::find($data);
                $alternatif = alternatif::find($id);
                $alternatif->subkriteria()->sync($data);

                $simpan = DB::table('alternatif')
                ->where('id', $id)
                ->update(['Verifikasi' => 'Sudah Terverifikasi']);
               
                return redirect(route('nilai.verifikasi'))->with('status', 'data berhasil disimpan!');
    
    
            

    }
}
