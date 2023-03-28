<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Barryvdh\DomPDF\PDF;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Pemeriksaan $pemeriksaan, Pasien $pasien)
    {
      $dataPemeriksaan = Pemeriksaan::with('dokter')->where('pasien_id', $pasien->pasien_id)->get();
      $data = [
        'pemeriksaans' => $dataPemeriksaan
      ];
      return view('cetak-pasien', $data);
      dd($dataPemeriksaan);
      $data = $dataPemeriksaan;
      view()->share('pemeriksaans', $data);
      // $pdf = PDF::loadView('cetak-pasien', $data);
      // return $pdf->download($pasien->nama_pasien . '.pdf');
    }
    
    public function save(Request $request)
    {

        //If the number passes, the method will continue from here.
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
