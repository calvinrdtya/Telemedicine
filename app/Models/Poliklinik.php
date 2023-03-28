<?php

namespace App\Models;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poliklinik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
  
    public function dokter()
    {
      return $this->belongsTo(Dokter::class);
    }
}
