<?php

use App\Models\Obat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\CetakController;
use App\Http\Controllers\PraktekController;
use App\Http\Controllers\PasienProfilController;
use App\Http\Controllers\ScreeningPasienController;
// use App\Http\Controllers\Obat\ObatController;
// use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dokter\DokterController;
// use App\Http\Controllers\Jadwal\JadwalController;
// use App\Http\Controllers\Pasien\PasienController;
// use App\Http\Controllers\Pegawai\PegawaiController;
// use App\Http\Controllers\Rekam\RekamMedisController;
// use App\Http\Controllers\Admin\AdminDokterController;
// use App\Http\Controllers\Dokter\DaftarDokterController;
// use App\Http\Controllers\Pasien\DaftarPasienController;
// use App\Http\Controllers\Konsultasi\KonsultasiController;
// use App\Http\Controllers\Perjanjian\PerjanjianController;
// use App\Http\Controllers\Poliklinik\PoliklinikController;
// use App\Http\Controllers\Pemeriksaan\PemeriksaanController;
// use App\Http\Controllers\Rekam\RekamMedisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('index', [
      "title" => "Home",
      "active" => 'home'
  ]);
});
Route::get('konsultasi', function () {
  return view('konsultasi/index', [
      "title" => "Konsultasi"
  ]);
});
// Route::get('konsultasi', function () {
//   return view('konsultasi/create', [
//       "title" => "Home",
//       "active" => 'home'
//   ]);
// });

// Route::get('pasien', function () {
//   return view('daftar-pasien.create', [
//       'title' => '',
//       'active' => 'daftar-pasien'
//   ]);
// });

Auth::routes();
// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkRole:dokter,admin');
// Route::get('/generate-pdf/{pasien}', [PasienController::class, 'generatePDF'])->name('generatePDF')->middleware('checkRole:dokter,admin,pasien');
// Route::get('/cetak-kartu/{konsultasi}', [KonsultasiController::class, 'cetakKartu'])->name('cetakKartu')->middleware('checkRole:admin,pasien');

Route::get('/index', function () {return view('/index');})->middleware('guest');
// Route::get('/konsultasi', function () {return view('/konsultasi.index');})->middleware('guest');
// Route::resource('dokter', DokterController::class);
// Route::resource('admin', AdminController::class)->middleware('checkRole:admin');
// Route::resource('admin-dokter', AdminDokterController::class)->middleware('checkRole:admin');
// Route::resource('obat', ObatController::class)->middleware('checkRole:dokter,admin');
// Route::resource('perjanjian', PerjanjianController::class)->middleware('checkRole:admin');

// Route::resource('pasien', PasienController::class)->middleware('checkRole:admin,dokter');
// Route::resource('daftar-dokter', DaftarDokterController::class)->middleware('checkRole:pasien');
// Route::resource('pegawai', PegawaiController::class)->middleware('checkRole:admin');
// Route::delete('pegawai/delete', [PegawaiController::class, 'destroy'])->middleware('checkRole:admin,dokter')->name('pegawai.hapus');

// Route::delete('praktek/delete', [PraktekController::class, 'destroy'])->middleware('checkRole:admin,dokter')->name('praktek.hapus');
// Route::resource('praktek', PraktekController::class)->middleware('checkRole:dokter,admin,pasien');
// Route::resource('pemeriksaan', PemeriksaanController::class)->middleware('checkRole:admin,dokter');
// Route::resource('pemeriksaan', PemeriksaanController::class)->middleware('checkRole:dokter');
// Route::resource('pegawai', PegawaiController::class)->middleware('checkRole:admin');
// Route::resource('poliklinik', PoliklinikController::class)->middleware('checkRole:admin');
// Route::resource('jadwal_praktek', JadwalController::class)->middleware('checkRole:admin,pasien,dokter');
// Route::resource('rekam_medis', RekamMedisController::class)->middleware('checkRole:dokter');
// Route::group(['prefix' => 'admin'], function () {
  Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [PasienProfilController::class, 'index'])->name('pasien.profil');
    Route::get('/profil/create', [PasienProfilController::class, 'create'])->name('pasien.profil.create');
    Route::post('/profil', [PasienProfilController::class, 'store'])->name('pasien.profil.store');
    Route::get('/profil/{profil}/edit', [PasienProfilController::class, 'edit'])->name('pasien.profil.edit');
    Route::put('/profil/{profil}', [PasienProfilController::class, 'update'])->name('pasien.profil.update');
    Route::delete('/profil/{profil}', [PasienProfilController::class, 'destroy'])->name('pasien.profil.destroy');
  });
// });

// Route::resource('konsultasi', PraktekController::class)->middleware('checkRole:pasien,dokter,admin');

Route::middleware(['auth'])->group(function () {
  Route::get('konsultasi', [ScreeningPasienController::class, 'index'])->name('konsultasi.index');
  Route::post('konsultasi', [ScreeningPasienController::class, 'store'])->name('konsultasi.store');
  Route::get('konsultasi/create', [ScreeningPasienController::class, 'create'])->name('konsultasi.create');
  Route::get('konsultasi/{konsultasi}/edit', [ScreeningPasienController::class, 'edit'])->name('konsultasi.edit');
  Route::put('konsultasi/{konsultasi}', [ScreeningPasienController::class, 'update'])->name('konsultasi.update');
  Route::delete('konsultasi/{screening}', [ScreeningPasienController::class, 'destroy'])->name('konsultasi.destroy');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');
  Route::get('/konsultasi', [DokterController::class, 'konsultasi'])->name('dokter.konsultasi');

  // Route::post('konsultasi', [ScreeningPasienController::class, 'store'])->name('konsultasi.store');
  // Route::get('konsultasi/create', [ScreeningPasienController::class, 'create'])->name('konsultasi.create');
  // Route::get('konsultasi/{konsultasi}/edit', [ScreeningPasienController::class, 'edit'])->name('konsultasi.edit');
  // Route::put('konsultasi/{konsultasi}', [ScreeningPasienController::class, 'update'])->name('konsultasi.update');
  // Route::delete('konsultasi/{screening}', [ScreeningPasienController::class, 'destroy'])->name('konsultasi.destroy');
});
// Route::resource('konsultasi', PasienController::class);




// Route::get('rekam_medis/create', [RekamMedisController::class, 'create'])->middleware('checkRole:dokter');
// Route::resource('pegawai/index', [PegawaiController::class, 'index'])->middleware('checkRole:admin')->name('pegawai.index');
