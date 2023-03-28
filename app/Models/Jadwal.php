<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
  
    // public function pasiens()
    // {
    //   return $this->hasMany(Pasien::class);
    // }
    public function poliklinik()
    {
      return $this->belongsTo(Poliklinik::class);
    }
}
