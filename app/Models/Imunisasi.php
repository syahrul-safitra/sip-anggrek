<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_imunisasi',
        'kode_anak',
        'catatan',
        'tanggal',
    ];

    public function anak() {
        return $this->belongsTo(Anak::class, 'kode_anak', 'kode_anak');
    }

    public function scopeFilter($query, $search)
    {
        $query->when($search ?? false, function ($query, $search) {
            return $query->where('kode_anak', '=',  $search );
        });
    }

}
