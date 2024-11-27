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
            {{-- <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                @include('mitra.layouts.navbar')
            </nav> --}}

        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold"><a href="{{ route('mitra.perjalanan.order') }}"><span class="text-muted fw-light">Order / </span></a>Detail</h4>

                <!-- Basic Bootstrap Table -->
                @include('mitra.message')
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center">{{ $order_perjalanan->invoice_number }}</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                @if ($order_perjalanan->perjalanan->thumbnail)
                                    <img src="{{ asset($order_perjalanan->perjalanan->thumbnail) }}" alt="Order Perjalanan Image" class="img-fluid" width="70%">
                                @else
                                    <img src="{{ asset('front-assets/img_blank.jpg') }}" alt="Order Perjalanan Image" class="img-fluid" width="30%">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <h5 class="m-0">Informasi Paket</h5>
                                <div class="p-2">
                                    <div class="col-md-12">
                                        <dl class="row my-2">
                                            <dd class="col-sm-4">Paket</dd>
                                            <dd class="col-sm-8">{{ $order_perjalanan->perjalanan->title }}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-12">
                                        <dl class="row my-2">
                                            <dd class="col-sm-4">Kota</dd>
                                            <dd class="col-sm-8">{{ $order_perjalanan->perjalanan->kota }}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-12">
                                        <dl class="row my-2">
                                            <dd class="col-sm-4">Durasi Paket</dd>
                                            <dd class="col-sm-8">{{ $order_perjalanan->perjalanan->durasi }}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-12">
                                        <dl class="row my-2">
                                            <dd class="col-sm-4">Jenis Paket</dd>
                                            <dd class="col-sm-8">{{ $order_perjalanan->perjalanan->jenis }} Trip</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-12">
                                        <dl class="row my-2">
                                            <dd class="col-sm-4">Harga</dd>
                                            <dd class="col-sm-8">Rp {{ $formatted_price }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="col-md-8 mt-3">
                            <h5 class="m-0">Informasi Pemesan</h5>
                            <div class="p-2">
                                <div class="col-md-12">
                                    <dl class="row my-2">
                                        <dd class="col-sm-4">Nama</dd>
                                        <dd class="col-sm-8">{{ $order_perjalanan->title }}&nbsp;{{ $order_perjalanan->first_name }}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-12">
                                    <dl class="row my-2">
                                        <dd class="col-sm-4">No. Handphone</dd>
                                        <dd class="col-sm-8">{{ $order_perjalanan->no_handphone }}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-12">
                                    <dl class="row my-2">
                                        <dd class="col-sm-4">Email</dd>
                                        <dd class="col-sm-8">{{ $order_perjalanan->email }}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-12">
                                    <dl class="row my-2">
                                        <dd class="col-sm-4">Titik Penjemputan</dd>
                                        <dd class="col-sm-8">{{ $order_perjalanan->titik }}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-12">
                                    <dl class="row my-2">
                                        <dd class="col-sm-4">Tanggal Perjalanan</dd>
                                        <dd class="col-sm-8">{{ $tanggal_perjalanan }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection