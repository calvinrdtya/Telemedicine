<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Requests\Pasien\PasienRequest;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Perjanjian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Pemeriksaan;
use Illuminate\Support\Facades\App;
use PDF;

class PasienController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $perjanjians = Perjanjian::with('pasien')->where('pasien_id', Auth::user()->id)->get();
    $data  = [
      'pasiens' => $perjanjians,
      'active' => 'daftar-pasien'
    ];
    return view('pasien.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $dokter = Dokter::all();
    $pasien = Pasien::all();
    // $perjanjian = Perjanjian::all();
    $obat = Obat::all();
    $data  = [
      'dokters' => $dokter,
      'pasiens' => $pasien,
      // 'perjanjians' => $perjanjian,
      'obats' => $obat,
      'active' => 'dashboard',
    ];
    return view('pasien.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
        'no_telp' => 'required|numeric|digits:12'
    ]);

    $input = $request->all();
    $pasien = Pasien::create($input);
    // $validatedData['tgl_datang'] = Carbon::now();

    return redirect()->route('home');
    return back()->with('success', 'User created successfully.');

    // $validatedData = $request->all();
    // $validatedData['tgl_datang'] = Carbon::now();
    // Pasien::create($validatedData);

    // return redirect()->route('home');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */

  public function show(Pasien $pasien)
  {
    // $pasiens = Pasien::all();
    // $pasien = Pasien::with('nama_pasien')->where('dokter_id', Auth::user()->id)->get();
    // $data = [
    //   'pasiens' => $pasien,
    // ];

    // return view('dokter.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function edit(Pasien $pasien)
  {
    $pasien = Pasien::all();
    $dokter = Dokter::all();
    $obat = Obat::all();
    $data = [
      'pasien' => $pasien,
      'obats' => $obat,
      'dokters' => $dokter,
      'active' => 'dokter'
    ];
    return view('pasien.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pasien $pasien)
  {
    $validatedData = $request->all();
    $validatedData['tgl_datang'] = $pasien->tgl_datang;
    // return $validatedData;
    $pasien->update($validatedData);

    return redirect()->route('pasien.update');
  }
  

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pasien $pasien, Pemeriksaan $pemeriksaan)
  {
    // $perjanjian = Perjanjian::where('id', $pasien->nama_pasien)->delete();
    $pasien->delete();
    // $pemeriksaan->delete();
    return redirect()->route('home');
  }

  public function generatePDF(Pasien $pasien, Pemeriksaan $pemeriksaan)
  {
    $dataPasien = Pasien::with('dokter')->where('nama_pasien', $pasien->nama_pasien)->get();
    // $dataPemeriksaan = Pemeriksaan::with('dokter')->where('pasien_id', $pemeriksaan->pasien_id)->get();
    $data = [
      'pasiens' => $dataPasien,
      // 'pemeriksaans' => $dataPemeriksaan
    ];
    return view('cetak-pasien', $data);
    dd($dataPasien);
    $data = $dataPasien;
    view()->share('pasiens', $data);
    // $pdf = PDF::loadView('cetak-pasien', $data);
    // return $pdf->download($pasien->nama_pasien . '.pdf');
  }
}