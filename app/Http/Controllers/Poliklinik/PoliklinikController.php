<?php

namespace App\Http\Controllers\Poliklinik;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poliklinik;
use Illuminate\Http\Request;
use App\Http\Requests\Poliklinik\PoliklinikRequest;
use App\Http\Controllers\Controller;

class PoliklinikController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $data = [
            'polikliniks' => $poliklinik,
            'dokters' => $dokter,
            'active' => 'profil',
        ];
        return view('poliklinik.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $data = [
            'polikliniks' => $poliklinik,
            'dokters' => $dokter,
            'active' => 'profil',
        ];
        return view('poliklinik.create', $data);
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
        Poliklinik::create($validatedData);
    
        return redirect()->route('poliklinik.index');
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
    public function edit(Request $request, $id)
    {
        $poliklinik = Poliklinik::find($id);
        $dokter = Dokter::all();
        $data = [
            'polikliniks' => $poliklinik,
            'dokters' => $dokter,
            'active' => 'dokter'
    ];
    return view('poliklinik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poliklinik $poliklinik)
    {
        $validatedData = $request->all();
        $poliklinik->update($validatedData);
        return redirect()->route('poliklinik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poliklinik $poliklinik)
    {
        $poliklinik->delete();
        return redirect()->route('poliklinik.index');
    }
}
