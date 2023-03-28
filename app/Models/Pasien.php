<?php

namespace App\Models;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pemeriksaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
  use HasFactory;
  protected $guarded = ['pasien_id'];
  public $timestamps = true;

  public function dokter()
  {
    return $this->belongsTo(Dokter::class);
  }

  public function obats()
  {
    return $this->hasMany(Obat::class);
  }

  public function pemeriksaan()
  {
    return $this->belongsTo(Pemeriksaan::class);
  }
}
