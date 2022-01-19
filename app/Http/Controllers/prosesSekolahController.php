<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;
use DB;
use Illuminate\Support\Facades\Hash;
class prosesSekolahController extends Controller
{
    //
    public function sekolah ()
    {
        // return view('Sekolah.sekolah');
        $sekolahs=sekolah::paginate(10);
        // $cek=$sekolahs->lastPage();
        // $paginator = $sekolahs->url($cek);
        // dd($paginator);
        
       
        return view('Sekolah.sekolah',compact('sekolahs'));
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$sekolah = DB::table('sekolah')
		->where('NPSN','like',"%".$cari."%")
        ->paginate();
        
        // dd($sekolah);
 
    		// mengirim data pegawai ke view index
		return view('Sekolah.sekolah',['sekolahs' => $sekolah]);
 
	}

    public function tampiltambah ()
    {
        return view('Sekolah.tambah');
    }


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



       return back()->with('status', 'data berhasil ditambah!');
            

    }
    public function passwordsimpan ($id, Request $request)
    {
        // return "berhasil";
        
        $validation = $request->validate([
            'password'=>'required'
            ],
            [
                'password.required'=>'Passoword Tidak Boleh Kosong!',
            ]
        );

        sekolah::findOrfail($id)->update([
            'password'=>Hash::make($request->get('password'))
        ]);

        return redirect('admin/sekolah')->with('status', 'Password berhasil diubah!');

    }



    public function hapusdata ($id)
    {
        DB::table('sekolah')->where('id',$id)->delete();
        return redirect('/admin/sekolah')->with('status', 'data berhasil dihapus!');
    }

    public function editdata ($id)
    {
        // return view('Sekolah.edit');

        $editSekolah = DB::table('sekolah')->where('id',$id)->first();
        return view('Sekolah.edit',['editSekolah'=> $editSekolah]);
    }

    public function editpassword($id)
    {
        $editSekolah = DB::table('sekolah')->where('id',$id)->first();
        // dd ($editSekolah);
        return view('Sekolah.gantipassword',['editSekolah'=>$editSekolah]);
    }

    
    public function updatedata ($id, Request $request)
    {
        
       
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
            ]
        );

        // DB::table('sekolah')
        //       ->where('id', $id)
        //       ->update([
                  
        //         'nama_sekolah' => $request->get('nama'),
        //         'NPSN' => $request->get('npsn'),
        //         'jenjang_pendidikan'=>$request->get('jpendidikan'),
        //         'status_sekolah'=>$request->get('ssekolah'),
        //         'alamat'=>$request->get('alamat'),
        //         'kecamatan'=>$request->get('kecamatan'),
        //         'kabupaten'=>$request->get('kabupaten'),
        //         'lintang'=>$request->get('lintang'),
        //         'bujur'=>$request->get('bujur'),
        //         'no_telpon'=>$request->get('ntelpon'),
              
        //       ]);

        sekolah::findOrfail($id)->update([
            'nama_sekolah'=>$request->get('nama'),
            'NPSN'=>$request->get('npsn'),
            'jenjang_pendidikan'=>$request->get('jpendidikan'),
            'status_sekolah'=>$request->get('ssekolah'),
            'alamat'=>$request->get('alamat'),
            'kecamatan'=>$request->get('kecamatan'),
            'kabupaten'=>$request->get('kabupaten'),
            'lintang'=>$request->get('lintang'),
            'bujur'=>$request->get('bujur'),
            'no_telpon'=>$request->get('ntelpon'),
        ]);

        return redirect('admin/sekolah')->with('status', 'data berhasil diubah!');
    }

}
