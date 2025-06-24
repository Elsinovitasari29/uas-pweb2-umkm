<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{

    protected $table = 'umkm';
    protected $fillable = [
        'nama',
        'foto',
        'modal',
        'pemilik',
        'alamat',
        'website',
        'email',
        'kabkota_id',
        'rating',
        'kategori_umkm_id',
        'pembina_id',
    ];

    // Relasi contoh (optional, jika ada model terkait)
    public function kabkota()
    {
        return $this->belongsTo(Kabkota::class);
    }

    public function kategoriUmkm()
    {
        return $this->belongsTo(KategoriUmkm::class);
    }

    public function pembina()
    {
        return $this->belongsTo(Pembina::class);
    }
}

