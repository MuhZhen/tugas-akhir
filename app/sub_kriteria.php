<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_kriteria extends Model
{
    //
    protected $table = 'sub_kriteria';
    protected $primaryKey = 'id';
    protected $fillable = ['kriteria_id','nama','bobot'];

    public function kriteria() //function nama kelas model kriteria
    {
        return $this->belongsTo('App\kriteria');
    }

    public function nilai() {
        return $this->belongsTo(\App\nilai_alternatif::class);
    }
}
