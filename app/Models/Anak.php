<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik_anak',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'berat_lahir',
        'tinggi_lahir',
        'proses_melahirkan',
        'nik_ayah'
    ];

    public function parent() {
        return $this->belongsTo(Parentt::class, 'nik_ayah', 'nik_ayah');
    }

    public function imunisasi() {
        return $this->hasMany(Imunisasi::class, 'nik_anak', 'nik_anak');
    }

    public function tumbuhKembang() {
        return $this->hasMany(TumbuhKembangAnak::class, 'nik_anak', 'nik_anak');
    }

}
