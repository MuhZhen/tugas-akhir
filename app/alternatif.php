<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alternatif extends Model
{
    //

    protected $table = 'alternatif';
    protected $primaryKey = 'id';
    protected $fillable = ['bantuan_id','distribusi','verifikasi'];

    public function subkriteria()
    {
        return $this->belongsToMany(\App\sub_kriteria::class,'nilai_alternatif','alternatif_id','sub_id');
    }

    public function bantuan() //function nama kelas model kriteria
    {
        return $this->belongsTo('App\bantuan');
    }
}
