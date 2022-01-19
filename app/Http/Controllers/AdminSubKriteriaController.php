<?php

namespace App\Http\Controllers;

use App\sub_kriteria;
use App\kriteria;
use Illuminate\Http\Request;
use DB;

class AdminSubKriteriaController extends Controller
{
    //

    public function TampilkanSubKriteria(Request $req)
    {   
     
        

        $TampilSubKriteria = sub_kriteria::paginate(4);
        $kriteria = kriteria::all();
        // // // return $TampilSubKriteria;
        // // // return view('Admin.AdminAturSubKriteria');
        if ($req->k)
        {
            $kriteria = kriteria::all();
            $TampilSubKriteria = kriteria::find($req->k)->sub_kriteria;
            // return $TampilSubKriteria;
            return view('Admin.AdminAturSubKriteria',compact('TampilSubKriteria','kriteria'));
        }

        else {
            return view('Admin.AdminAturSubKriteria',compact('TampilSubKriteria','kriteria'));
        }
        

        // $kriteria   = kriteria::all();
        // return view('Admin.AdminAturSubKriteria',compact('kriteria'));
        
        // if ($req->k)
        // {
        //     $TampilSubKriteria = kriteria::find($req->k)->sub_kriteria;
        //     // return $TampilSubKriteria;
        //     return view('Admin.AdminAturSubKriteria',compact('TampilSubKriteria'));
        // }

    

        
        

      


    }

    public function TampilkanTambahSubKriteria()
    {
        $TampilDataKriteria = kriteria::all();
        // return $TampilDataKriteria;
        return view('Admin.AdminTambahSubKriteria',Compact('TampilDataKriteria'));
        // return view('Admin.AdminTambahSubKriteria');
    }


   
    
    public function TambahDataSubKriteria(Request $request)
    {
        $validation = $request->validate([
            'kriteria_id'=>'required',
            'nama'=>'required',
            'bobot'=>'required|numeric|between:0,99.99'
            ],
            [
                'kriteria_id.required'=>'kriteria Tidak Boleh Kosong!',
                'nama.required'=>'Nama Tidak Boleh Kosong!',
                'bobot.required'=>'Bobot Tidak Boleh Kosong!',
                'bobot.numeric'=>'Bobot dalam bentuk angka!',
            ]
        );

        
        $sub_kriteria= new sub_kriteria;
        $sub_kriteria->kriteria_id =$request->kriteria_id;
        $sub_kriteria->nama =$request->nama;
        $sub_kriteria->bobot =$request->bobot;
        $sub_kriteria->save();

        return redirect('/admin/atur/sub-kriteria')->with('status', 'data berhasil ditambah!');
    }

    
    // public function TampilkanEditKriteria()
    // {
    //     $TampilSubKriteria = kriteria::all();
    //     return view('Admin.AdminEditSubKriteria',Compact('TampilSubKriteria'));
    // }

    public function TampilEditSubKriteria($id)
    {
        // return "berhasil";
        $EditTampilSubKriteria = sub_kriteria::find($id);
        $tampilkriteria = kriteria::all();
        // // return $EditTampilSubKriteria;
        // // return $tampilkriteria;
        // return view('Admin.AdminEditSubKriteria',Compact('EditTampilSubKriteria'));
        // return view('Admin.AdminEditSubKriteria',['EditTampilSubKriteria'=> $EditTampilSubKriteria]);
        return view('Admin.AdminEditSubKriteria',Compact('EditTampilSubKriteria','tampilkriteria'));

    }

    public function TampilkanEditKriteria()
    {
        $tampilkriteria = kriteria::all();
        return view('Admin.AdminEditSubKriteria',Compact('tampilkriteria'));
    }
    

    public function UpdateSubKriteria($id, Request $request)
    {
        $validation = $request->validate([
            'kriteria'=>'required',
            'subkriteria'=>'required',
            'bobot'=>'required|numeric|between:0,99.99'
            ],
            [
                'kriteria.required'=>'Nama Kriteria Tidak Boleh Kosong!',
                'subkriteria.required'=>'Nama Sub Kriteria Tidak Boleh Kosong!',
                'bobot.required'=>'Bobot Tidak Boleh Kosong!',
                'bobot.numeric'=>'Bobot dalam bentuk angka!',
                
            ]
        );


        sub_kriteria::findOrfail($id)->update([
            // 'kriteria_id'=>$request->get('kriteria'),
            'kriteria_id'=>$request->get('kriteria'),
            'nama'=>$request->get('subkriteria'),
            'bobot'=>$request->get('bobot'),
            
        ]);

        return redirect('/admin/atur/sub-kriteria')->with('status', 'data berhasil diubah!');
    }

    public function HapusSubKriteria($id)
    {
        DB::table('sub_kriteria')->where('id',$id)->delete();
        return redirect('/admin/atur/sub-kriteria')->with('status', 'data berhasil dihapus!');
        
    }

}
