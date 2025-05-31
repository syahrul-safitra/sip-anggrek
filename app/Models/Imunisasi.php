<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_imunisasi',
        'nik_anak',
        'catatan',
        'tanggal',
    ];

    public function anak() {
        return $this->belongsTo(Anak::class, 'nik_anak', 'nik_anak');
    }

    public function scopeFilter($query, $search)
    {
        $query->when($search ?? false, function ($query, $search) {
            return $query->where('nik_anak', '=',  $search );
        });
    }

}
