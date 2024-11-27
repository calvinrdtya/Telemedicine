@extends('layouts.main')

@section('content')

<div id="content">
  <div class="container-fluid mt-5">
    <h1 class="h3 mb-2 text-gray-800">Rekam Pasien</h1>
    <p class="mb-4">Rekam Medis Sdr {{ $pasien->nama_pasien }}</p>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        {{-- <span>
          <a href="{{ route('dokter.index') }}" class="btn btn-primary font-weight-bold">
            Kembali </a> </span> <span>
          <a href="{{ route('generatePDF', $pasien->id ) }}" class="btn btn-success font-weight-bold">
            Cetak Rekam Pasien
          </a>
        </span> --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Pasien</th>
                <th>Alamat Pasien</th>
                <th>Tanggal Berobat</th>
                <th>Keluhan</th>
                <th>Nama Dokter</th>
                <th>Obat</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pasiens as $p)
              <tr>
                <td>{{ $p->nama_pasien }}</td>
                <td>{{ $p->alamat_pasien }}</td>
                <td>{{ $p->tgl_datang }}</td>
                <td>{{ $p->keluhan_pasien }}</td>
                <td>{{ $p->dokter->nama_dokter }}</td>
                <td>{{ $p->nama_obat }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection