<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienProfil extends Model
{
    use HasFactory;

    protected $table = 'pasien_profil';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tgl_lahir',
        'alamat',
        'no_telp',
        'email',
        'pekerjaan',
        'gol_darah',
    ];
}
