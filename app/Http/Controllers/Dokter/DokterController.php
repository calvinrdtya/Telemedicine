<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Perjanjian;
use App\Models\PasienScreening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dokterId = Auth::id();

    // Ambil data screenings berdasarkan dokter yang login
    $screenings = PasienScreening::where('dokter_id', $dokterId)->get();

    $data = [
        'screenings' => $screenings,
        'active' => 'dokter'
    ];

    return view('dokter.dashboard', $data);
  }

  public function konsultasi()
  {
    $dokterId = Auth::id();

    // Ambil data screenings berdasarkan dokter yang login
    $screenings = PasienScreening::where('dokter_id', $dokterId)->get();

    $data = [
        'screenings' => $screenings,
        'active' => 'dokter'
    ];

    return view('dokter.konsultasi.index', $data);
  }
  

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $dokters = Dokter::all();
    $obats = Obat::all();
    $perjanjian = Perjanjian::where('nama_dokter', Auth::user()->name)->get();
    $data = [
      'dokters' => $dokters,
      'perjanjians' => $perjanjian,
      'obats' => $obats,
      'active' => 'dokter.create'
    ];
    return view('dokter.create', $data);
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function show(Dokter $dokter)
  {
    $pasien = Pasien::with('pasien')->where('dokter_id', Auth::user()->id)->get();
    $data = [
      'pasiens' => $pasien,
    ];

    return view('dokter.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function edit(Dokter $dokter)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Dokter $dokter)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function destroy(Dokter $dokter)
  {
    //
  }
}
