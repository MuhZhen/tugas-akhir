<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bantuan extends Model
{
    //
    protected $table = 'bantuan';
    protected $primaryKey = 'id';
    protected $fillable = ['sekolah_id','bantuan, periode'];

    public function sekolah() //function nama kelas model kriteria
    {
        return $this->belongsTo('App\sekolah');
    }

    public function data_periode()
    {
        return $this->belongsTo('App\data_periode');
    }

}
