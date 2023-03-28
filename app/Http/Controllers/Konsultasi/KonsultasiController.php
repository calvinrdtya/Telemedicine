<?php

namespace App\Http\Controllers\Konsultasi;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use Barryvdh\DomPDF\PDF;
use App\Models\Konsultasi;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perjanjian = Perjanjian::all();
        $pasien = Pasien::with('pasien')->where('id', Auth::user()->id)->get();
        $data  = [
          'pasiens' => $pasien,
          'perjanjians' => $perjanjian,
          'active' => 'daftar-pasien'
        ];
        return view('konsultasi.index', $data);
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
        // $obat = Obat::all();
        $data  = [
          'dokters' => $dokter,
          'pasiens' => $pasien,
          // 'perjanjians' => $perjanjian,
        //   'obats' => $obat,
        //   'active' => 'dashboard',
        ];
        return view('konsultasi.create', $data);
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
        // dd($validatedData);
        // $validatedData['tgl_datang'] = Carbon::now();
        Konsultasi::create($validatedData);

        return redirect()->route('konsultasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function cetakKartu(Konsultasi $konsultasi)
    {
      $dataKonsultasi = Konsultasi::with('dokter')->where('nama_pasien', $konsultasi->nama_pasien)->get();
      $data = [
        'konsultasis' => $dataKonsultasi
      ];
      return view('cetak-kartu', $data);
      dd($dataKonsultasi);
      $data = $dataKonsultasi;
      view()->share('konsultasis', $data);
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
