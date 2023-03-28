@extends('layouts.main')

@section('content')

<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Edit Dokter</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Edit Data Diri Dokter
          <span>
            <a href="{{ route('obat.index') }}" class="btn ml-4 btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
               back
            </a>
          </span>
        </h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin-dokter.update', $dokter->id) }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          {{-- <input type="hidden" name="{{ $users->id }}" value="{{ $users->id }}"> --}}
          <div class="form-group">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Nama Dokter"
              value="{{ $dokter->nama_dokter }}">
          </div>
          <div class="form-group">
            <label for="no_telp">No Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon"
              value="{{ $dokter->no_telp}}">
          </div>
          <div class="form-group">
            <label for="alamat_dokter">Alamat</label>
            <textarea name="alamat_dokter" class="form-control" id="exampleFormControlTextarea1"
              rows="3">{{ $dokter->alamat_dokter }}</textarea>
          </div>
          <div class="form-group">
            <label for="spesialisasi_dokter">Spesialisasi</label>
            <select name="spesialisasi_dokter" class="form-control" id="spesialisasi_dokter">
              <option value="Poli Umum" {{($dokter->spesialisasi_dokter === 'Poli Umum') ? 'Selected' : ''}}>Poli
                Umum
              </option>
              <option value="Poli Anak" {{($dokter->spesialisasi_dokter === 'Poli Anak') ? 'Selected' : ''}}>Poli
                Anak
              </option>
              <option value="Poli Lansia" {{($dokter->spesialisasi_dokter === 'Poli Lansia') ? 'Selected' : ''}}>
                Poli
                Lansia
              </option>
              <option value="Kebidanan dan Kandungan" {{($dokter->spesialisasi_dokter === 'Kebidanan dan Kandungan') ? 'Selected' : ''}}>
                Kebidanan dan Kandungan
              </option>
              <option value="Spesialis Mata" {{($dokter->spesialisasi_dokter === 'Spesialis Mata') ? 'Selected' : ''}}>
                  Spesialis Mata
              </option>
              <option value="Dokter Gigi" {{($dokter->spesialisasi_dokter === 'Dokter Gigi') ? 'Selected' : ''}}>
                  Dokter Gigi
              </option>
              <option value="Spesialis Dalam" {{($dokter->spesialisasi_dokter === 'Spesialis Dalam') ? 'Selected' : ''}}>
                  Spesialis Dalam
              </option>
              <option value="Spesialis Bedah" {{($dokter->spesialisasi_dokter === 'Spesialis Bedah') ? 'Selected' : ''}}>
                  Spesialis Bedah
              </option>
              <option value="Spesialis Saraf" {{($dokter->spesialisasi_dokter === 'Spesialis Saraf') ? 'Selected' : ''}}>
                  Spesialis Saraf
              </option>
            </select>
          </div>
          <button type="submit" class="btn btn-info">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection