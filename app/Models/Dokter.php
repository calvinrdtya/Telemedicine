<?php

namespace App\Models;

use App\Models\Pasien;
use App\Models\Poliklinik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
  use HasFactory;
  protected $guarded = ['id'];

  public function pasiens()
  {
    return $this->hasMany(Pasien::class);
  }
  public function poliklinik()
  {
    return $this->belongsTo(Poliklinik::class);
  }
}
