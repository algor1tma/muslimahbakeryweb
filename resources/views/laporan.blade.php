@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Laporan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-2">Laporan</h5>
                        <div class="text-center">
                            <a id="printBtn" class="btn btn-primary">Print</a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pesanan</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($laporan->tanggal_pesanan)->format('d-m-Y') }}</td>
                                    <td>{{ $laporan->nama }}</td>
                                    <td>{{ ucfirst($laporan->status) }}</td>
                                    <td>Rp {{ number_format($laporan->total_harga, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Function to handle printing
    function printReport() {
        window.print();
    }

    // Add click event listener to print button
    document.getElementById('printBtn').addEventListener('click', printReport);
</script>

@endsection
