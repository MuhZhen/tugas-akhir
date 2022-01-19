<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    //
    protected $table = 'kriteria';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','bobot','atribut'];
    public function sub_kriteria() {
        return $this->hasMany(\App\sub_kriteria::class);
    }
}
