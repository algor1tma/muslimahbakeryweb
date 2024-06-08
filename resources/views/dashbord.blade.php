@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="container">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Pemasukan</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>Rp {{ number_format($totalHarga, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Transaksi</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $jumlahLaporan }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah User</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $jumlahUser }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->
                    </div>
                </div>

               <!-- Reports -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reports</h5>
            <!-- Line Chart -->
            <div id="reportsChart"></div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const chartData = @json($chartData);

                    new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [
                            {
                                name: 'Jumlah Transaksi',
                                data: chartData.map(item => item.jumlahTransaksi)
                            },
                            {
                                name: 'Jumlah User',
                                data: chartData.map(item => item.jumlahUser)
                            }
                        ],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: { show: false },
                        },
                        markers: { size: 4 },
                        colors: ['#2eca6a', '#ff771d'],
                        fill: {
                            type: "gradient",
                            gradient: { shadeIntensity: 1, opacityFrom: 0.3, opacityTo: 0.4, stops: [0, 90, 100] }
                        },
                        dataLabels: { enabled: false },
                        stroke: { curve: 'smooth', width: 2 },
                        xaxis: { categories: chartData.map(item => item.month) },
                        tooltip: { x: { show: false } }
                    }).render();
                });
            </script><!-- End Line Chart -->
        </div>
    </div>
</div><!-- End Reports -->



                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pesanan yang belum Lunas</h5>
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanans as $psns)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $psns->user->name }}</td>
                                        <td>Rp {{ number_format($psns->total_harga, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->
            </div>
        </div><!-- End Left side columns -->
    </div>
</section>
@endsection
