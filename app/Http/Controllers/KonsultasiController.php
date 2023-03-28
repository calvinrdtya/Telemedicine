<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Konsultasi;
use App\Models\Pasien;
// use App\Models\Perjanjian;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $konsultasi = Konsultasi::all();
        // $perjanjians = Perjanjian::with('pasien')->where('pasien_id', Auth::user()->id)->get();
        $data  = [
        'konsultasis' => $konsultasi,
        'active' => 'perjanjian'
        ];
        return view('praktek.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $konsultasi = Konsultasi::all();
        $data  = [
          'dokters' => $dokter,
          'pasiens' => $pasien,
          'konsultasis' => $konsultasi,
          'active' => 'perjanjian'
        ];
        return view('praktek.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Konsultasi $konsultasi)
    {
        $validdatedData = $request->all();
        $konsultasi = Konsultasi::create($validdatedData);
    
        return redirect()->route('praktek.index');
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
    public function destroy(Konsultasi $konsultasi)
    {
        $konsultasi->delete();
        return redirect()->route('praktek.index');
    }
}
