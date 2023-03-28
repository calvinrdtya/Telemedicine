<?php

namespace App\Http\Controllers\Pasien;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DaftarPasienController extends Controller
{
    public function index()
    {
      $pasien = Pasien::all();
      $perjanjian = Perjanjian::all();
      // $pasien = Pasien::with(['dokter'])->get();
      // $pasien = Dokter::with('pasiens')->where('nama_dokter', Auth::user()->name)->get()->collect();
      // $obat = Obat::with('pasien')->get();
      $data = [
      'pasiens' => $pasien,
      'perjanjians' => $perjanjian,
      'active' => 'daftar-pasien'
      ];
      return view('praktek.index', $data);
    }

public function create()
  {
    $perjanjian = Perjanjian::all();
    $pasien = Pasien::all();
    $dokter = Dokter::all();
    $obat = Obat::all();
    $data  = [
      'dokters' => $dokter,
      'pasiens' => $pasien,
      'perjanjians' => $perjanjian,
      'obats' => $obat,
      'active' => 'daftar-pasien',
    ];
    return view('praktek.create', $data);
  }

    public function edit(Pasien $pasien)
    {
      $pasien = Pasien::all();
      $dokters = Dokter::all();
      $obats = Obat::all();
      $data = [
        'pasiens' => $pasien,
        'obats' => $obats,
        'dokters' => $dokters,
        'active' => 'daftar-pasien',
      ];
      return view('praktek.edit', $data);
    }

    public function update(Request $request, Pasien $pasien)
    {
      $validatedData = $request->all();
      $validatedData['tgl_datang'] = $pasien->tgl_datang;
      // return $validatedData;
      $pasien->update($validatedData);
      return redirect()->route('praktek.index');
    }

    public function show(Pasien $pasien, $id)
    {
    //   $pasiens = Pasien::all();
      // $pasien = Pasien::with('nama_pasien')->where('dokter_id', Auth::user()->id)->get();
      $pasien = Pasien::find($id);
      // var_dump($pasien);
      $data = [
        'pasiens' => $pasien,
        'active' => 'daftar-pasien',
      ];
  
      return view('praktek.show', $data);
    }

    public function destroy(Pasien $pasien)
    {
      $perjanjian = Perjanjian::where('id', $pasien->nama_pasien)->delete();
      $pasien->delete();
      return redirect()->route('home');
    }
}
