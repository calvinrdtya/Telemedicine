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
                    <h4 class="fw-bold">History Order</h4>
                    @include('mitra.message')
                    <div class="card">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-header mb-0">Data History</h5>
                            <div class="d-flex align-items-center">
                                {{-- <a href="" class="btn btn-sm btn-primary me-3">
                                    Add Kategori
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
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Paket</th>
                                        <th>Invoice</th>
                                        <th>Tanggal</th>
                                        <th>Harga Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($historyPerjalanan as $history)
                                        <tr>
                                            <td>{{ $history->perjalanan->id }}</td>
                                            <td>{{ $history->first_name }}</td>
                                            <td>{{ $history->perjalanan->title }}</td> 
                                            <td>{{ $history->invoice_number  }}</td>
                                            <td>{{ $history->tgl_perjalanan  }}</td>
                                            <td>{{ $history->formatted_price }}</td>
                                            <td>
                                                <!-- Tambahkan aksi lain seperti tombol edit atau hapus -->
                                                <a href="" type="button" class="btn btn-sm btn-outline-secondary me-2">
                                                    <i class='bx bx-search-alt-2'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection