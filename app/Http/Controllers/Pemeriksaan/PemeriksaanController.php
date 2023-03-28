<?php

namespace App\Http\Controllers\Pemeriksaan;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use Barryvdh\DomPDF\PDF;
use App\Models\Perjanjian;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pasien $pasien, Dokter $dokter, Obat $obat)
    {
      // $pasien = Pasien::with('pasien_id')->where('nama_pasien', $pasien->nama_pasien)->get();
      $dokter = Dokter::all();
      $pasien = Pasien::all();
      // $pasien = Pasien::find($id);
      $obat = Obat::all();
      // $perjanjian = Perjanjian::all();
      $pemeriksaan = Pemeriksaan::all();
      // $pemeriksaan = Pemeriksaan::all();
      $data  = [
        'dokters' => $dokter,
        'pasiens' => $pasien,
        'obats' => $obat,
        // 'perjanjians' => $perjanjian,
        'pemeriksaans' => $pemeriksaan,
        'active' => 'perjanjian'
      ];
      return view('pemeriksaan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->all();
      $validatedData['no_pemeriksaan'] = Carbon::now();
      Pemeriksaan::create($validatedData);

      return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $pemeriksaan = Pemeriksaan::where('no_pemeriksaan', $id)->get();
      $pasien = Pasien::find($id);
      $obat =  Obat::all();
      $dokter =  Dokter::all();
      $data = [
          'dokters' => $dokter,
          'pasiens' => $pasien,
          'obat' => $obat,
          'pemeriksaans' => $pemeriksaan,
          'active' => 'pasien'
        ];
        return view('pemeriksaan.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $dokter = Dokter::all();
      $pasien = Pasien::find($id);
      $obat = Obat::all();
      $perjanjian = Perjanjian::all();
      $pemeriksaan = Pemeriksaan::where('pasien_id', $id)->get();
      // $pemeriksaan = Pemeriksaan::all();
      $data  = [
        'dokters' => $dokter,
        'pasiens' => $pasien,
        'obats' => $obat,
        'perjanjians' => $perjanjian,
        'pemeriksaans' => $pemeriksaan,
        'active' => 'perjanjian'
      ];
      return view('pemeriksaan.create', $data);
    }

    
    public function generatePDF(Pasien $pasien)
    {
      $dataPasien = Pasien::with('dokter')->where('nama_pasien', $pasien->nama_pasien)->get();
      $data = [
        'pasiens' => $dataPasien
      ];
      return view('cetak-kartu', $data);
      dd($dataPasien);
      $data = $dataPasien;
      view()->share('pasiens', $data);
      // $pdf = PDF::loadView('cetak-pasien', $data);
      // return $pdf->download($pasien->nama_pasien . '.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
