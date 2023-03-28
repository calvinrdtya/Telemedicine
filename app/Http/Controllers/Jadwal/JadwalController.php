<?php

namespace App\Http\Controllers\Jadwal;

use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::All();
        $data = [
            'dokters' => $dokter,
            'active' => 'jadwal'
        ];
        return view('jadwal_praktek.index', $data);
        
        // if {
        //     (Auth::user()->role === 'pasien') 
        //     return view('jadwal_praktek.index', $data);
        // } else {
        //     (Auth::user()->role === 'dokter')
        //     return view('jadwal_praktek.jadwal', $data);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = Jadwal::all();
        $data = [
            'jadwals' => $jadwal,
            'active' => 'jadwal_praktek.create'
        ];

        return view('jadwal_praktek.create', $data);
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
        $dokter = Dokter::find($id);
        $data = [
            'dokters' => $dokter,
            'active' => 'jadwal'
        ];  
        return view('jadwal_praktek.show', $data);
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
