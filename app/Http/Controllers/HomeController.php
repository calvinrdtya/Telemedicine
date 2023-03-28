<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Perjanjian;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $pasien = Pasien::all();
    $perjanjian = Perjanjian::all();
    $p = Pasien::count();
    $dokter = Dokter::count();
    $obat =  Obat::count();
    // $perjanjian = Perjanjian::where('nama_dokter', Auth::user()->name)->get();
    $pemeriksaan = Pemeriksaan::where('no_pemeriksaan', Auth::user()->name)->get();
    $data = [
      'pasiens' => $pasien,
      'pasien' => $p,
      'dokters' => $dokter,
      'obats' => $obat,
      'perjanjians' => $perjanjian,
      'pemeriksaans' => $pemeriksaan,
      // 'active' => 'home',
      'active' => 'dashboard',
      // 'active' => 'perjanjian'
    ];
    return view('home', $data);
  }
}
