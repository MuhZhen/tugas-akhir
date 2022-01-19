<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    //
    protected $table = 'sekolah';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_sekolah','NPSN','jenjang_pendidikan','status_sekolah','alamat','kecamatan','kabupaten','lintang','bujur','no_telpon','password'];

    public function bantuan() {
        return $this->hasOne(\App\bantuan::class);
    }

    


    
}
