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
                    <h4 class="fw-bold">Order</h4>

                    @include('mitra.message')
                    <div class="card">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-header mb-0">Data Order</h5>
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
                                        <th>Invoice</th>
                                        <th>Pembayaran</th>
                                        <th>Harga Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->first_name }}</td>
                                        <td>{{ $order->invoice_number }}</td>
                                        <td>
                                            @if ($order->payment_status == 1)
                                                <span class="badge bg-label-warning">Menunggu Pembayaran</span>
                                            @elseif ($order->payment_status == 2)
                                                <span class="badge bg-label-success">Berhasil</span>
                                            @elseif ($order->payment_status == 3)
                                                <span class="badge bg-label-secondary">Expired</span>
                                            @elseif ($order->payment_status == 4)
                                                <span class="badge bg-label-danger">Pembayaran Gagal</span>
                                            @endif
                                        </td>
                                        <td>{{ formatRupiah($order->grand_total) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('mitra.perjalanan.order.detail', $order->id) }}" type="button" class="btn btn-sm btn-outline-secondary me-2">
                                                    <i class='bx bx-search-alt-2'></i>
                                                </a>                                         
                                                <form action="{{ route('mitra.perjalanan.order.selesai', $order->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                                            {{-- @if($order->is_disabled) disabled @endif> --}}
                                                        Selesai
                                                    </button>
                                                </form>
                                            </div>
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