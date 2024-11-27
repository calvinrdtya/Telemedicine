<?php

namespace App\Http\Controllers;

use App\Models\PasienScreening;
use App\Models\User;
use Illuminate\Http\Request;

class ScreeningPasienController extends Controller
{
    public function index()
    {
        $screenings = PasienScreening::all();
        return view('front.pasien.konsultasi.index', compact('screenings'));
    }

    public function create()
    {
        $pasien = User::where('role', 'pasien')->get();
        return view('konsultasi.create', compact('pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialiasi_dokter' => 'required|string|max:255',
            'tgl_perjanjian' => 'required|date',
            'waktu_perjanjian' => 'required|date_format:H:i',
            'pasien_id' => 'required|exists:users,id',
        ]);

        PasienScreening::create($request->all());

        return redirect()->route('konsultasi.index')->with('success', 'Konsultasi berhasil dibuat.');
    }

    public function edit(PasienScreening $konsultasi)
    {
        $pasien = User::where('role', 'pasien')->get();
        return view('konsultasi.edit', compact('konsultasi', 'pasien'));
    }

    public function update(Request $request, PasienScreening $screening)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialiasi_dokter' => 'required|string|max:255',
            'tgl_perjanjian' => 'required|date',
            'waktu_perjanjian' => 'required|date_format:H:i',
            'pasien_id' => 'required|exists:users,id',
        ]);

        $screening->update($request->all());

        return redirect()->route('konsultasi.index')->with('success', 'Konsultasi berhasil diperbarui.');
    }

    public function destroy(PasienScreening $screening)
    {
        $screening->delete(); // Menghapus data
    
        return redirect()->route('konsultasi.index')->with('success', 'Konsultasi berhasil dihapus.');
    }    
}
