@extends('layouts.main')

@section('content')

<div id="content">
  <div class="container-fluid mt-5">
    <h1 class="h3 mb-2 text-gray-800">Rekam Medis</h1>
    {{-- @foreach ($pasiens as $p) --}}
      <p class="mb-4">Sdr {{ $pasiens->nama_pasien }}</p>
    {{-- @endforeach --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <span>
          <a href="{{ route('home') }}" class="btn btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
             back
          </a>
        </span>
          <span>
          <a href="{{ route('generatePDF', $pasiens->id ) }}" class="btn btn-success font-weight-bold">
            Cetak Rekam Pasien
          </a>
        </span>
          <span>
          <a href="{{ route('pemeriksaan.create', $pasiens->id ) }}" class="btn btn-info font-weight-bold">
            Add Rekam Medis
          </a>
        </span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
              <tr>
                {{-- <th>No Pasien</th> --}}
                <th>Keluhan</th>
                <th>Diagnosa</th> 
                <th>Tindakan</th>
                <th>Obat</th>
                <th>Berat Badan</th>
                <th>Tensi Diastolik</th>
                <th>Tensi Sistolik</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pemeriksaans as $pm)
              <tr>
                {{-- <td>{{ $pm->no_pemeriksaan }}</td> --}}
                <td>{{ $pm->keluhan }}</td>
                <td>{{ $pm->diagnosa }}</td>
                <td>{{ $pm->tindakan }}</td>
                <td>{{ $pm->obat }}</td>
                <td>{{ $pm->berat_badan }}</td>
                <td>{{ $pm->tensi_diastolik }}</td>
                <td>{{ $pm->tensi_sistolik }}</td>
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