<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    use HasFactory;
    protected $guarded = ['no_pemeriksaan'];

    public $timestamps = true;
  
    public function dokter()
    {
      return $this->belongsTo(Dokter::class);
    }
  
    public function pasien()
    {
      return $this->hasMany(Pasien::class);
    }

    public function rekam_medis()
    {
      return $this->belongsTo(rekam_medis::class);
    }
}
