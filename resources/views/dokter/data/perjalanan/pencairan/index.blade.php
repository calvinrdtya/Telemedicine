@extends('mitra.layouts.app')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            @include('mitra.layouts.sidebar')
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                @include('mitra.layouts.navbar')
            </nav>

            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold">Pencairan Dana</h4>

                    <!-- Basic Bootstrap Table -->
                    @include('mitra.message')
                        <div class="card">
                            {{-- <div class="d-flex align-items-center">
                                <h5 class="card-header">Data Perjalanan</h5>
                                <a href="{{ route('mitra.perjalanan.create') }}" class="btn btn-sm btn-primary">
                                    Add Perjalanan
                                </a>
                            </div> --}}
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-header mb-0">Data Pencairan</h5>
                                <div class="d-flex align-items-center">
                                    {{-- <a href="" class="btn btn-sm btn-primary me-3">
                                        Tambah Perjalanan
                                    </a> --}}
                                    <div class="nav-item d-flex align-items-center">
                                        <i class="bx bx-search fs-4 lh-0 me-2"></i>
                                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bukti Transfer</th>
                                            <th>Paket Wisata</th>
                                            <th>Diajukan</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @forelse ($pencairan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($item->foto_bukti == null)
                                                        -
                                                    @else
                                                        <img src="{{ asset($item->foto_bukti) }}" alt="" width="80">
                                                    @endif
                                                </td>
                                                <td>{{ $item->historyPerjalanan->perjalanan->title }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}</td>
                                                <td>Rp {{ number_format($item->jumlah_pencairan, 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge bg-label-success">Sudah Cair</span>
                                                    @elseif ($item->status == 2)
                                                        <span class="badge bg-label-danger">Ditolak</span>
                                                    @else
                                                        <span class="badge bg-label-secondary">Proses</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data pencairan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="content-backdrop fade"></div>
</div>

@endsection