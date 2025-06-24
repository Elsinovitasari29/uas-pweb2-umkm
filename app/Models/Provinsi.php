<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $fillable = ['nama', 'ibukota', 'latitude', 'longtitude'];

    public function kabkota()
    {
        return $this->hasMany(Kabkota::class);
    }
}