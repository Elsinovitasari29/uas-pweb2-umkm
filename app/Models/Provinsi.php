<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $fillable = ['nama', 'ibukota', 'lotitude', 'longtitude'];

    public function kabkota()
    {
        return $this->hasMany(Kabkota::class);
    }
}