<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class penggunaAuth extends Authenticatable

{
    use Notifiable;

    
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username','nama_asli','alamat','no_telpon','email','password','level_akses','remember_token',
    ];

 
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
