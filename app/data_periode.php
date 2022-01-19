<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_periode extends Model
{
    //

    protected $table = "data_periode";

    protected $fillable = [
        "nama_periode",
        "tahun",
    ];

    public $timestamp = false;

    public function kode()
    {
        return $this->hasMany('App\data_periode');
    }
}
