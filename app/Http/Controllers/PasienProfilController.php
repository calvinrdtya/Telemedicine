<?php

namespace App\Http\Controllers;

use App\Models\PasienProfil;
use Illuminate\Http\Request;

class PasienProfilController extends Controller
{
    public function index()
    {
        $profil = auth()->user()->profil; // Ambil profil yang terkait dengan user yang sedang login
        return view('front.pasien.profil.index', compact('profil'));
    }

    // Menampilkan form untuk membuat profil baru
    public function create()
    {
        return view('front.pasien.profil.create');
    }

    // Menyimpan profil baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'pekerjaan' => 'required',
            'gol_darah' => 'required',
        ]);

        PasienProfil::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'gol_darah' => $request->gol_darah,
        ]);

        return redirect()->route('pasien.profil.index');
    }

    // Menampilkan form untuk mengedit profil
    public function edit(PasienProfil $profil)
    {
        return view('front.pasien.profil.edit', compact('profil'));
    }

    // Memperbarui profil pasien
    public function update(Request $request, PasienProfil $profil)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'pekerjaan' => 'required',
            'gol_darah' => 'required',
        ]);

        $profil->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'gol_darah' => $request->gol_darah,
        ]);

        return redirect()->route('pasien.profil.index');
    }

    // Menghapus profil pasien
    public function destroy(PasienProfil $profil)
    {
        $profil->delete();
        return redirect()->route('pasien.profil.index');
    }
}
