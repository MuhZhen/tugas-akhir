<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alternatif;
use App\nilai_alternatif;
use App\kriteria;
use DB;

class prosesAlternatifController extends Controller
{
    //

    public function proses ()
    {
        
        //
        $liat = alternatif::all();
        $nilai = nilai_alternatif::all();

        if ($liat->isEmpty())
        {
            return view ("Error.dataKosong");
        }

        else if($nilai->isEmpty())
        {
            return view("error.dataKosong");
        }

        else
        {
            //

           

            
                        $kriteria = kriteria::all();
                        $alternatif = alternatif::all();
                        $kode_krit = [];


                        

                                    foreach ($kriteria as $krit)
                                    {
                                        $kode_krit[$krit->id] = [];
                                        
                                    

                                        foreach ($alternatif as $al)
                                            {
                                                foreach ($al->subkriteria as $subkriteria)
                                                {
                                                    

                                                        if ($subkriteria->kriteria->id == $krit->id)
                                                        {
                                                            $kode_krit[$krit->id][] = $subkriteria->bobot; 
                                                        }

                                                    
                                                        
                                                        
                                                }
                                            }





                                        if ($krit->atribut == 'Cost')
                                        {
                                            $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
                                        } 
                                        
                                        elseif ($krit->atribut == 'Benefit')
                                        {
                                            $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
                                        }

                                    };


            

           

            
          
                        // dd($nilai);
                        return view('Admin.AdminProses2',[
                            'kriteria'      => $kriteria,
                            'alternatif'    => $alternatif,
                            'kode_krit'     => $kode_krit,
                            'nilai'         => $nilai
                        ]);

            


            //

        }

       

        //
        
    }

    public function detailProses () {
        
        $liat = alternatif::all();
        $nilai = nilai_alternatif::all();

        if ($liat->isEmpty())
        {
            return view ("Error.dataKosong");
        }

        else if($nilai->isEmpty())
        {
            return view("error.dataKosong");
        }

        else
        {
            //

           

            
                        $kriteria = kriteria::all();
                        $alternatif = alternatif::all();
                        $kode_krit = [];


                        

                                    foreach ($kriteria as $krit)
                                    {
                                        $kode_krit[$krit->id] = [];
                                        
                                    

                                        foreach ($alternatif as $al)
                                            {
                                                foreach ($al->subkriteria as $subkriteria)
                                                {
                                                    

                                                        if ($subkriteria->kriteria->id == $krit->id)
                                                        {
                                                            $kode_krit[$krit->id][] = $subkriteria->bobot; 
                                                        }

                                                    
                                                        
                                                        
                                                }
                                            }





                                        if ($krit->atribut == 'Cost')
                                        {
                                            $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
                                        } 
                                        
                                        elseif ($krit->atribut == 'Benefit')
                                        {
                                            $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
                                        }

                                    };


            

           

            
          
                        // dd($nilai);
                        return view('Admin.AdminDetailProses',[
                            'kriteria'      => $kriteria,
                            'alternatif'    => $alternatif,
                            'kode_krit'     => $kode_krit,
                            'nilai'         => $nilai
                        ]);

            


            //

        }

        
    }

    
}
