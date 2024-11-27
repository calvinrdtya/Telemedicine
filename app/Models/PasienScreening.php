<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PasienScreening extends Model
{
    use HasFactory;

    protected $table = 'screenings';

    protected $fillable = [
        'nama_pasien',
        'nama_dokter',
        'spesialiasi_dokter',
        'tgl_perjanjian',
        'waktu_perjanjian',
        'pasien_id',
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function getTglPerjanjianAttribute($value)
    {
        return Carbon::parse($value)->locale('id')->isoFormat('dddd, D MMMM YYYY');
    }

    public function getWaktuPerjanjianAttribute($value)
    {
        return Carbon::parse($value)->format('H:i'); // Format jam:menit
    }
    
    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

}
