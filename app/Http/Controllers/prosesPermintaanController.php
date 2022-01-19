<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bantuan;
use App\sekolah;
use App\data_periode;
use DB;

class prosesPermintaanController extends Controller
{
    //
    public function permintaan (Request $req)
    {
        // return view('permintaan.permintaan');
        // $tampilBantuan=bantuan::paginate(5);
        // return view('permintaan.permintaan',compact('tampilBantuan'));

        // $tampilBantuan=sekolah::find($req->k)->bantuan;
      
      

        $tampilBantuan = DB::table('bantuan')
        ->join('sekolah','sekolah.id','=','bantuan.sekolah_id')
        ->join('data_periode','data_periode.id','=','bantuan.periode')
        ->select('bantuan.*','sekolah.nama_sekolah','sekolah.NPSN', 'data_periode.nama_periode')
        ->paginate(10);
        
      $tampilPeriode = DB::table("data_periode")
      ->get();
    //   dd($tampilPeriode);

    //   dd($tampilPeriode);
        // dd($tampilBantuan);
        // $sekolah = sekolah::all();

        

        if ($req->k)
        {
           
            $sekolah = sekolah::all();
            $tampilBantuan=sekolah::find($req->k)->bantuan;
            

            return view('permintaan.permintaan',compact('tampilBantuan','sekolah','tampilPeriode'));
        }

        else
        {
            return view('permintaan.permintaan',compact('tampilBantuan','tampilPeriode'));
        }
        




    }


    public function hapusSemua(Request $request)
    {
        $cari = $request->periode;
        
        $dapat = DB::table('bantuan')
       ->where('periode','like',"%".$cari."%")
       ->pluck('periode')
       ->first();


    //    dd($dapat);

    // $bantuan_cari=bantuan::where("periode","=",$dapat);

    if($dapat==null){
        return ("data_kosong");
    }

    else {

        $cari_data = DB::table('bantuan')
        ->where('periode', '=', $dapat)
        ->get();
    
    
    
    
        $bantuan_cari = DB::table('bantuan')
                        ->where('periode', '=', $dapat)
                        ->delete();
        
        // dd($bantuan_cari);
        // $picture->delete;
            
            // DB::table('bantuan')->delete($bantuan_cari);
            return redirect('admin/permintaan')->with('status', 'data berhasil dihapus!');

        
    }

    

   
    }



    public function tambahSemua ()
    {
        // return ("masuk");

        $dapat="Aktif";

        // dd($dapat);

        $dapatHasil = DB::table('data_periode')->where('status', 'aktif')->first();

    //    dd($dapatHasil);

        return view('permintaan.tambahSemua',compact('dapatHasil'));

        // // $cari = $request->cari_periode;
        // // dd($cari);

        // $bantuan_cari = DB::table('sekolah')
        // ->pluck('id');

        // dd($bantuan_cari);



        // // $cek=DB::table('bantuan')->pluck('id');
        

        // foreach($bantuan_cari as $item){
        //     $bantuan= new bantuan;
        //     $bantuan->sekolah_id =$item;
        //     $bantuan->bantuan ="Belum Tersalurkan";
        //     $bantuan->periode ="Belum Terverifikasi";
        //     $bantuan->save();

        // }
    }

    public function simpanSemua (Request $request)
    {

        // $cari = $request->cari_periode;
        // dd($cari);

         $bantuan_cari = DB::table('sekolah')
        ->pluck('id');

        // dd($bantuan_cari);



        // $cek=DB::table('bantuan')->pluck('id');
        

        foreach($bantuan_cari as $item){
            $bantuan= new bantuan;
            $bantuan->sekolah_id =$item;
            $bantuan->bantuan ="Masukan Bantuan";
            $bantuan->periode = $request->periode;
            $bantuan->save();

        }
		
		return redirect('admin/permintaan')->with('status', 'data berhasil dihapus!');
    }



    public function carisekolah(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
    		// mengambil data dari table pegawai sesuai pencarian data
            
    

            $tampilPeriode = DB::table("data_periode")
            ->get();
          
       
            
    
            
       $NPSN = DB::table('sekolah')
       ->where('NPSN','like',"%".$cari."%")
       ->paginate();

       $tampilBantuan = DB::table('bantuan')
        ->join('sekolah','sekolah.id','=','bantuan.sekolah_id')
        ->join('data_periode','data_periode.id','=','bantuan.periode')
        ->select('bantuan.*','sekolah.nama_sekolah','sekolah.NPSN','data_periode.nama_periode')
        ->where('NPSN','like',"%".$cari."%")
        ->paginate();

        

        // dd($tampilBantuan);
        return view('permintaan.permintaan',compact('tampilBantuan','tampilPeriode'));

       
 
	}


    public function tampiltambah ($id)
    {
        $sekolahId = sekolah::find($id);
        
        // $dataPeriode = data_periode::all();
        
        $dataPeriode = DB::table('data_periode')
                ->where('status', '=', "Aktif")
                ->get();
        
        // dd($dataPeriode);

        $TampilDataSekolah = sekolah::all();
        return view('permintaan.tambah',Compact('sekolahId','TampilDataSekolah', 'dataPeriode'));
        
    }

    public function tampilTambahTabel()
    {
        $sekolahs=sekolah::paginate(10000);
        return view('permintaan.tambahTabel',compact('sekolahs'));
    }

 
    public function tambahdata(Request $request)
    {
        $validation = $request->validate([
            'sekolah_id'=>'required',
            'bantuan'=>'required',
            'periode'=>'required',
            
            ],
            [
                'sekolah_id.required'=>'Sekolah Tidak Boleh Kosong!',
                'bantuan.required'=>'Bantuan Tidak Boleh Kosong!',
                'periode.required'=>'Periode Tidak Boleh Kosong!',
            ]
        );

        $bantuan= new bantuan;
        $bantuan->sekolah_id =$request->sekolah_id;
        $bantuan->bantuan =$request->bantuan;
        $bantuan->periode = $request->periode;
        $bantuan->save();

        return redirect('admin/permintaan')->with('status', 'data berhasil ditambah!');

    }

    public function hapus ($id)
    {
        DB::table('bantuan')->where('id',$id)->delete();
        return redirect('/admin/permintaan')->with('status', 'data berhasil dihapus!');
    }

    public function tampilEdit ($id)
    {
        // $editBantuan = DB::table('bantuan')->where('id',$id)->first();
        // return view('permintaan.edit',['editBantuan'=> $editBantuan]);
        
        $data_join = DB::table('bantuan')
        ->join('data_periode', 'bantuan.periode', '=', 'data_periode.id')
        ->select('bantuan.*','data_periode.nama_periode')
        ->where('bantuan.id',$id)
        ->first();

        // dd($data_join);

        $data_periode=data_periode::all();

        $editBantuan = bantuan::find($id);
        $tampilSekolah = sekolah::all();
        
        return view('permintaan.edit',Compact('editBantuan','tampilSekolah','data_periode','data_join'));
    }

    public function updatedata ($id, Request $request)
    {
        $validation = $request->validate([
            'bantuan'=>'required',
            'periode'=>'required',
            ],
            [
                'bantuan.required'=>'Bantuan Tidak Boleh Kosong!',
                'periode.required'=>'Bantuan Tidak Boleh Kosong!',
            ]
        );

        // bantuan::findOrfail($id)->update([
        //     'bantuan'=>$request->get('bantuan'),
        //     'periode'=>$request->get('periode')
        // ]);

        DB::table('bantuan')
            ->where('id', $id)
            ->update(['bantuan' => $request->get('bantuan'), 'periode' => $request->get('periode') ]);

        return redirect('admin/permintaan')->with('status', 'data berhasil diubah!');
    }
}
