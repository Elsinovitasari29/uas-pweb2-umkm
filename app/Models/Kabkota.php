<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
     protected $table = 'kabkota'; 
    protected $fillable = ['nama', 'latitude', 'longtitude', 'provinsi_id'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function umkm()
    {
        return $this->hasMany(Umkm::class);
    }
}

