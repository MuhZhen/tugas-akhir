<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alternatif;
use App\kriteria;
use App\bantuan;
use App\sekolah;
use App\data_periode;
use DB;


class AlternatifController extends Controller
{
    //
    public function TampilkanAlternatif(Request $req)
    {
        // $TampilAlternatif = alternatif::paginate(10);
        // return $alternatif;
        // return view("Admin.AdminAturAlternatif");
        // return view('Admin.AdminAturAlternatif',compact('TampilAlternatif'));


        // $TampilAlternatif=alternatif::paginate(10);
        // $sekolah = sekolah::all();

        $TampilAlternatif = DB::table('alternatif')
        ->join('bantuan','bantuan.id','=','alternatif.bantuan_id')
        ->join('sekolah','sekolah.id','=','bantuan.sekolah_id')
        ->join('data_periode','bantuan.periode','=','data_periode.id')
        ->select('alternatif.*','sekolah.nama_sekolah','sekolah.NPSN','alternatif.distribusi','alternatif.verifikasi','bantuan.bantuan','bantuan.periode','data_periode.nama_periode')
        ->paginate(10);



        $dataPeriode = DB::table('data_periode')
                ->where('status', '=', "Aktif")
                ->get();
        // dd($dataPeriode);

        // dd($TampilAlternatif);
       
        

        if ($req->k)
        {
            $dataPeriode = data_periode::all();
            $sekolah = sekolah::all();
            $TampilAlternatif=sekolah::find($req->k)->alernatif;
            return view('Admin.AdminAturAlternatif',compact('TampilAlternatif','sekolah','dataPeriode'));
        }

        else
        {
            return view('Admin.AdminAturAlternatif',compact('TampilAlternatif','dataPeriode'));
        }
        

    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
    		// mengambil data dari table pegawai sesuai pencarian data
            
        // dd($cari);

        $dataPeriode = data_periode::all();
            
       
        $TampilAlternatif = DB::table('alternatif')
        ->join('bantuan','bantuan.id','=','alternatif.bantuan_id')
        ->join('sekolah','sekolah.id','=','bantuan.sekolah_id')
        ->join('data_periode','data_periode.id','=','bantuan.periode')
        ->select('alternatif.*','sekolah.nama_sekolah','sekolah.NPSN','alternatif.distribusi','alternatif.verifikasi','data_periode.id','data_periode.nama_periode')
        ->where('NPSN','like',"%".$cari."%")
        ->paginate(10);

      

        // dd($tampilBantuan);
        return view('Admin.AdminAturAlternatif',compact('TampilAlternatif','dataPeriode'));
 
 
	}

    public function TampilkanTambahAlternatif()
    {
        // return view("Admin.AdminTambahAlternatif");

        $tampilDataAlternatif = bantuan::all();
        // return $tampilDataAlternatif;

        return view('Admin.AdminTambahAlternatif',Compact('tampilDataAlternatif'));
    }

    public function TambahDataAlternatif(Request $request)
    {

        $cari = $request->cari_periode;
        // dd($cari);

        $bantuan_cari = DB::table('bantuan')
		->where('periode','like',"%".$cari."%")
        ->pluck('id');

        // dd($bantuan_cari);



        // $cek=DB::table('bantuan')->pluck('id');
        

        foreach($bantuan_cari as $item){
            $alternatif= new alternatif;
            $alternatif->bantuan_id =$item;
            $alternatif->distribusi ="Belum Tersalurkan";
            $alternatif->verifikasi ="Belum Terverifikasi";
            $alternatif->save();

        }

        // dd($cek);
        
        // $validation = $request->validate([
        //     'bantuan_id' => 'required',
        //     'keterangan' => 'required',
        // ],[
        //     'bantuan_id.required' => 'Alternatif Tidak Boleh Kosong!!!',
        //     'keterangan.required' => 'Keterangan Tidak Boleh Kosong!!!',
        // ]);

        // $alternatif= new alternatif;
        // $alternatif->nama_alternatif =$request->nama;
        // $alternatif->keterangan =$request->keterangan;
        // $alternatif->save();

        // $simpanAlternatif = alternatif::create($request->all())->id;
        return redirect('admin/atur/alternatif');
        // return redirect(route('nilai.tambah',['id' => $simpanAlternatif]));

        // $alternatif= new alternatif;
        // $alternatif->nama_alternatif =$request->nama;
        // $alternatif->keterangan =$request->keterangan;
        // $alternatif->save();

        // return view('Admin.AdminNilaiAlternatif');
    }

   

    public function TampilEditAlternatif($id)
    {
        $EditTampilAlternatif = alternatif::find($id);
        return view('Admin.AdminEditAlternatif',compact('EditTampilAlternatif'));
    }

    public function UpdateAlternatif ($id, Request $request)
    {

    

        // dd($idBantuan);

        $validation = $request->validate([
            'distribusi' => 'required',
            'verifikasi' => 'required'
        ],[
            'distribusi.required' => 'distribusi Tidak Boleh Kosong!!!',
            'verifikasi.required' => 'verifikasi Tidak Boleh Kosong!!!'
        ]);

        
        DB::table('alternatif')
              ->where('id', $id)
              ->update([
                'distribusi'=>$request->get('distribusi'),
                'verifikasi'=>$request->get('verifikasi')
            ]);


          return redirect('/admin/atur/alternatif')->with('status', 'data berhasil diubah!');

        // alternatif::findOrfail($id)->update([
        //     // 'kriteria_id'=>$request->get('kriteria'),
        //     'distribusi'=>$request->get('distribusi'),
        //     'verifikasi'=>$request->get('verifikasi'),
        //     'bantuan_verifikasi'=>$request->get('bantuan'),
        // ]);

       


        
        
        

        
    }

    public function HapusAlternatif($id)
    {
        DB::table('alternatif')->where('id',$id)->delete();
        return redirect('/admin/atur/alternatif')->with('status', 'data berhasil dihapus!');
        
    }

    public function destroy($id)
    {
        $alternatif = alternatif::destroy($id);
        return redirect('/admin/atur/alternatif')->with('status', 'data berhasil dihapus!');
    }

    public function hapusSemua()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('alternatif')->truncate();
        DB::table('nilai_alternatif')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
       
        return redirect('/admin/atur/alternatif')->with('status', 'data berhasil dihapus!');
    }

   

    
}
