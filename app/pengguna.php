<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    //
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $fillable = ['username','nama_asli','alamat','no_telpon','email','password','level_akses','remember_token'];

    
}
