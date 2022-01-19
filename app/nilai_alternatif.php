<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai_alternatif extends Model
{
    //
    protected $table = 'nilai_alternatif';
    protected $primaryKey = 'id';
    protected $fillable = ['alternatif_id','sub_id'];

    public function sub_kriteria() {
        return $this->belongsTo(\App\sub_kriteria::class,'sub_id');
    }
    public function alternatif() {
        return $this->belongsTo(\App\alternatif::class,'alternatif_id');
    }
}
