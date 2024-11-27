<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
// use App\Models\Perjanjian;
use Barryvdh\DomPDF\PDF;
use App\Models\Konsultasi;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Konsultasi\KonsultasiRequest;
// use App\Models\Perjanjian;
// use App\Http\Requests\Perjanjian\PerjanjianRequest;

class PraktekController extends Controller
{
 /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $konsultasi = Konsultasi::all();
    // $perjanjians = Perjanjian::with('pasien')->where('pasien_id', Auth::user()->id)->get();
    $data  = [
      'konsultasis' => $konsultasi,
      'active' => 'perjanjian'
    ];
    return view('front.pasien.konsultasi.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $dokter = Dokter::all();
    // $pasien = Pasien::all();
    $konsultasi = Konsultasi::all();
    $data  = [
      'dokters' => $dokter,
      // 'pasiens' => $pasien,
      'konsultasis' => $konsultasi,
      'active' => 'perjanjian'
    ];
    return view('front.pasien.konsultasi.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(KonsultasiRequest $request)
  {
    $month = date('m');
    $day = date('d');
    $year = date('y');
    $today = $day. '-'. $month. '-'. $year;
    $today = Carbon::now()->toDateString();

    $this->validate($request, [
      'nama_pasien' => 'required',
      'nama_dokter' => 'required',
      'tgl_perjanjian' => 'required|date|after_or_equal:'.$today,
      'waktu_perjanjian' => 'required',
    ]);

    $validdatedData = $request->all();
    $konsultasi = Konsultasi::create($validdatedData);

    return redirect()->route('praktek.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Konsultasi  $perjanjian
   * @return \Illuminate\Http\Response
   */
  public function show(Konsultasi $konsultasi)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Perjanjian  $perjanjian
   * @return \Illuminate\Http\Response
   */
  public function edit(Konsultasi $konsultasi)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Konsultasi  $konsultasi
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Konsultasi $konsultasi)
  {
    $konsultasi = Konsultasi::find($request->id)->update([
      'status' => 'Accept'
    ]);

    return redirect()->route('praktek.index');
  }

  // public function cetakKartu(Konsultasi $konsultasi)
  // {
  //   $dataKonsultasi = Konsultasi::with('nama_dokter')->where('nama_pasien', $konsultasi->nama_pasien)->get();
  //   $data = [
  //     'konsultasis' => $dataKonsultasi
  //   ];
  //   return view('cetak-kartu', $data);
  //   dd($dataKonsultasi);
  //   $data = $dataKonsultasi;
  //   view()->share('konsultasis', $data);
  //   // $pdf = PDF::loadView('cetak-pasien', $data);
  //   // return $pdf->download($pasien->nama_pasien . '.pdf');
  // }


  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Konsultasi  $perjanjian
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    Konsultasi::find($request->id)->delete();
    return redirect()->route('praktek.index');
    // $perjanjian = Perjanjian::where('id', $id->nama_pasien)->delete();
    // $perjanjian->delete();

    // $perjanjian = Perjanjian::where('id', $perjanjian->nama_dokter)->delete();
    // $perjanjian->delete();
    // return redirect()->route('perjanjian.index');
  }
}
