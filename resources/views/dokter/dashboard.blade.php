@extends('dokter.layouts.app')

{{-- @include('admin.layouts.sidebar')
@include('admin.data.dokter-overview')
@include('admin.data.card') --}}

@section('content')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            @include('dokter.layouts.sidebar')
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            @include('dokter.layouts.navbar')
          </nav>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-lg-8 mb-4 order-0">
            <div class="row">
              <div class="col-sm-7">
                <div class="card mb-4">
                  <div class="card-body">
                      <h5 class="card-title text-primary mb-2">Selamat Datang!</h5>
                      <p class="mb-2">
                        Anda memiliki <span class="fw-bold">0</span> order terbaru
                      </p>                  
                      <a href="" class="btn btn-sm btn-outline-primary">Lihat Order</a>
                    </div>
                </div>
              </div>
                <div class="col-md-5 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="text-nowrap mb-2">Uang di Cairkan</h5>
                          <span class="badge bg-label-primary rounded-pill">Tahun 2024</span>
                        </div>
                        <small class="text-success text-nowrap fw-semibold mb-3">
                          <i class="bx bx-chevron-up"></i> 50%</small>
                        <div class="mt-sm-auto">
                          <h4 class="mb-0">0</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="card">
              <div class="row row-bordered g-0">
                <div class="col-md-8">
                  <h5 class="card-header m-0 me-2 pb-3">Total Transaksi</h5>
                  <div id="totalRevenueChart" class="px-2"></div>
                </div>
                <div class="col-md-4">
                  <div class="card-body">
                    <div class="text-center">
                      <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                          id="growthReportId"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          2024
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                          <a class="dropdown-item" href="javascript:void(0);">2022</a>
                          <a class="dropdown-item" href="javascript:void(0);">2021</a>
                          <a class="dropdown-item" href="javascript:void(0);">2020</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="growthChart"></div>
                  <div class="text-center fw-semibold pt-3 mb-2">62% Kenaikan</div>
                  <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                    <div class="d-flex">
                      <div class="me-2">
                        <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                      </div>
                      <div class="d-flex flex-column">
                        <small>2023</small>
                        <h6 class="mb-0">$32.5k</h6>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="me-2">
                        <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                      </div>
                      <div class="d-flex flex-column">
                        <small>2022</small>
                        <h6 class="mb-0">$41.2k</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          {{-- <div class="col-5 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title mb-1">
                      <h5 class="text-nowrap mb-2">Perlengkapan</h5>
                      <span class="badge bg-label-warning rounded-pill">Total Pendapatan</span>
                    </div>
                    <div class="mt-sm-auto">
                      <small class="text-success text-nowrap fw-semibold">
                        <i class="bx bx-chevron-up"></i> 
                      </small>
                      <small class="text-success text-nowrap fw-semibold" id="persentaseKenaikan">
                          <i class="bx bx-chevron-up"></i>
                      </small>
                      <p id="orderBulanLalu" style="display:none;">10</p>
                      <p id="orderBulanIni" style="display:none;">11</p>
                      <h3 class="mb-0">Rp. {{ number_format($data['totalPendapatanPerlengkapan'], 0, ',', '.') }}</h3>
                    </div>
                  </div>
                  <div id="profileReportChart"></div>
                </div>
              </div>
            </div>
          </div> --}}
          <!-- Total Revenue -->
          <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            
          </div>
          <!-- Transactions -->
          <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                  <h5 class="m-0 me-2">Statistik Order</h5>
                  {{-- <small class="text-muted">42.82k Total Sales</small> --}}
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="orederStatistics"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                    <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="d-flex flex-column align-items-center gap-1">
                    <h4 class="mb-2">0</h4>
                    <span>Total Pemasukan</span>
                  </div>
                  <div id="orderStatisticsChart"></div>
                </div>
                {{-- <ul class="p-0 m-0">
                  <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                      <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <h6 class="mb-0">Paket Wisata</h6>
                        <small class="text-muted">Mobile, Earbuds, TV</small>
                      </div>
                      <div class="user-progress">
                        <small class="fw-semibold">82.5k</small>
                      </div>
                    </div>
                  </li>
                </ul> --}}
              </div>
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="card-title m-0 me-2">Transaksi</h5>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="transactionID"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                      <a class="dropdown-item" href="">30 Hari Terakhir</a>
                      <a class="dropdown-item" href="">Bulan Lalu</a>
                      <a class="dropdown-item" href="">Tahun Lalu</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <small class="text-muted d-block">Transfer</small>
                          <h6 class="mb-0">Uang Masuk</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">Rp 260.000</h6>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 order-2 mb-4">
            
          </div>
          <!--/ Transactions -->
        </div>
        

            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Ambil data order bulan lalu dan bulan ini dari elemen data-attributes atau variabel
      var orderBulanLalu = parseInt(document.getElementById('orderBulanLalu').textContent);
      var orderBulanIni = parseInt(document.getElementById('orderBulanIni').textContent);

      // Hitung persentase kenaikan
      var persentaseKenaikan = 0;
      if (orderBulanLalu > 0) {
          persentaseKenaikan = ((orderBulanIni - orderBulanLalu) / orderBulanLalu) * 100;
      }

      // Format persentase dengan 2 desimal dan tambahkan simbol persen
      var formattedPersentase = persentaseKenaikan.toFixed(2) + '%';

      // Tampilkan hasil di elemen yang sesuai
      document.getElementById('persentaseKenaikan').textContent = formattedPersentase;
  });

  </script>

@endsection