<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dokter\DokterRequest;
use App\Models\Dokter;
use Illuminate\Http\Request;

class AdminDokterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dokter = Dokter::all();
    $data = [
      'dokters' => $dokter,
      'active' => 'dokter'
    ];
    return view('admin.dokter.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data = [
      'active' => 'dokter'
    ];
    return view('admin.dokter.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(DokterRequest $request)
  {
    $request->validate([
      'no_telp' => 'required|numeric|digits:12'
    ]);

    $input = $request->all();
    $dokter = Dokter::create($input);

    return back()->with('success', 'User created successfully.');

    // $validatedData = $request->all();
    // $dokter = Dokter::create($validatedData);
    // return redirect()->route('admin-dokter.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function show(Dokter $admin_dokter)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function edit(Dokter $admin_dokter)
  {
    $data = [
      'dokter' => $admin_dokter,
      'active' => 'admin.dokter'
    ];
    return view('admin.dokter.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Dokter $admin_dokter)
  {
    $validatedData = $request->all();
    $admin_dokter->update($validatedData);
    return redirect()->route('admin-dokter.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function destroy(Dokter $admin_dokter)
  {
    $admin_dokter->delete();
    return redirect()->route('admin-dokter.index');
  }
}
