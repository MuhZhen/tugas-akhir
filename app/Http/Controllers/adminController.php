<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pengguna;
use Illuminate\Support\Facades\Hash;
use DB;

class adminController extends Controller
{
    //
    public function tampiladmin()
    {
        $pengguna=pengguna::paginate(5);
        // dd($pengguna);
        return view('Admin.aturAdmin',compact('pengguna'));
    }

    public function tampiltambah()
    {
        return view('Admin.aturAdminTambah');
    }

    public function tambahdata(Request $request)
    {
        $validation = $request->validate([
            'username'=>'required',
            'nama_asli'=>'required',
            'alamat'=>'required',
            'no_telpon'=>'required',
            'email'=>'required',
            'password'=>'required',
            'level_akses'=>'required'
            ],
            [
                'username.required'=>'Username Sekolah Tidak Boleh Kosong!',
                'nama_asli.required'=>'Nama Lengkap Tidak Boleh Kosong!',
                'alamat.required'=>'Alamat Tidak Boleh Kosong!',
                'no_telpon.required'=>'Nomor Telpon Tidak Boleh Kosong!',
                'email.required'=>'Email Tidak Boleh Kosong!',
                'password.required'=>'Password Tidak Boleh Kosong!',
                'level_akses.required'=>'Level Akses Tidak Boleh Kosong!',
            ]
            );

            
        $pengguna= new pengguna;
        $pengguna->username =$request->username;
        $pengguna->nama_asli =$request->nama_asli;
        $pengguna->alamat =$request->alamat;
        $pengguna->no_telpon =$request->no_telpon;
        $pengguna->email =$request->email;
        $pengguna->password =Hash::make($request->password);
        $pengguna->level_akses =$request->level_akses;
        $pengguna->save();

        return redirect('admin/atur/admin')->with('status', 'data berhasil ditambah!');
    }

    public function editData($id)
    {
        $pengguna = DB::table('pengguna')->where('id',$id)->first();
        // dd($pengguna);
        return view('Admin.aturAdminEdit',['pengguna'=> $pengguna]);
    }

    public function updateData($id, Request $request)
    {
        $validation = $request->validate([
            'username'=>'required',
            'nama_asli'=>'required',
            'alamat'=>'required',
            'no_telpon'=>'required',
            'email'=>'required',
            'level_akses'=>'required'
            ],
            [
                'username.required'=>'Username Sekolah Tidak Boleh Kosong!',
                'nama_asli.required'=>'Nama Lengkap Tidak Boleh Kosong!',
                'alamat.required'=>'Alamat Tidak Boleh Kosong!',
                'no_telpon.required'=>'Nomor Telpon Tidak Boleh Kosong!',
                'email.required'=>'Email Tidak Boleh Kosong!',
                'level_akses.required'=>'Level Akses Tidak Boleh Kosong!',
            ]
            );

            pengguna::findOrfail($id)->update([
                'username'=>$request->get('username'),
                'nama_asli'=>$request->get('nama_asli'),
                'alamat'=>$request->get('alamat'),
                'no_telpon'=>$request->get('no_telpon'),
                'email'=>$request->get('email'),
                'level_akses'=>$request->get('level_akses'),
            ]);

            return redirect('admin/atur/admin')->with('status', 'data berhasil diubah!');
    }

    public function editpassword($id)
    {
        $pengguna = DB::table('pengguna')->where('id',$id)->first();
        // dd($pengguna);
        return view('Admin.aturAdminGantiPassword',['pengguna'=>$pengguna]);
    }


    public function passwordsimpan ($id, Request $request)
    {
        // return "berhasil";
        
        $validation = $request->validate([
            'password'=>'required'
            ],
            [
                'password.required'=>'Password Tidak Boleh Kosong!',
            ]
        );

        pengguna::findOrfail($id)->update([
            'password'=>Hash::make($request->get('password'))
        ]);

        return redirect('admin/atur/admin')->with('status', 'Password berhasil diubah!');

    }

    public function hapusData($id)
    {
        DB::table('pengguna')->where('id',$id)->delete();
        return redirect('admin/atur/admin')->with('status', 'data berhasil dihapus!');
    }
}
