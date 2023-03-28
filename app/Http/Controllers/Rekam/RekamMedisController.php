<?php

namespace App\Http\Controllers\Rekam;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Perjanjian;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $obat = Obat::all();
        $perjanjian = Perjanjian::all();
        $pemeriksaan = Pemeriksaan::all();
        $data  = [
          'dokters' => $dokter,
          'pasiens' => $pasien,
          'obats' => $obat,
          'perjanjians' => $perjanjian,
          'pemeriksaans' => $pemeriksaan,
          'active' => 'perjanjian'
        ];
        return view('rekam_medis.create', $data);
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
        $validatedData['tgl_datang'] = Carbon::now();
        Pasien::create($validatedData);

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
        $pemeriksaan = Pemeriksaan::where('pasien_id', $id)->get();
        $pasien = Pasien::find($id);
        // $perjanjian = Perjanjian::all();
        $obat =  Obat::count();
        $data = [
            //   'dokter' => $dokter,
            // 'perjanjians' => $perjanjian,
            'pasiens' => $pasien,
            'obat' => $obat,
            'pemeriksaans' => $pemeriksaan,
            'active' => 'dashboard'
          ];
          return view('rekam_medis.index', $data);
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
