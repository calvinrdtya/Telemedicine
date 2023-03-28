<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use App\Models\Pasien;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        $data = [
            'pegawais' => $pegawai,
            'active' => 'pegawai'
        ];

        return view('pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        $data = [
            'pegawais' => $pegawai,
            'active' => 'pegawai'
        ];

        return view('pegawai.create', $data);
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
        $pegawai = Pegawai::create($input);
    
        return back()->with('success', 'User created successfully.');

        // $validatedData = $request->all();
        // Pegawai::create($validatedData);
    
        // return redirect()->route('pegawai.index');
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
    public function edit(Pegawai $pegawai, Request $request)
    {
      $data = [
        'pegawais' => $pegawai,
        'active' => 'pegawai'
      ];
      return view('pegawai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'no_telp' => 'required|numeric|digits:12'
        ]);
        $input = $request->all();
        // $pegawai = Pegawai::update($input);

        $validateData = $request->all();
        // $pegawai->update($validatedData);
        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}
