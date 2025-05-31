<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TumbuhKembangAnak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik_anak',
        'tanggal',
        'berat_badan', 
        'tinggi_badan',
        'lingkar_kepala',
        'lingkar_lengan_atas'
    ];

    public function anak() {
        return $this->belongsTo(Anak::class, 'nik_anak', 'nik_anak');
    }

    

}
