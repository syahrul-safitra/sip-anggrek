<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parentt extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nik_ayah', 
        'nama_ayah', 
        'no_kk', 
        'no_telepon',
        'password'
    ];

    public function anak() {
        return $this->hasMany(Anak::class, 'nik_ayah', 'nik_ayah');
    }

}
