@extends('layout.app')
@section('content')
    <div class="pagetitle">
        <h1>Data Pesanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Pesanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Nama</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanans as $psns)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($psns->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ $psns->user->name }}</td>
                                        <td>Rp {{ number_format($psns->total_harga, 0, ',', '.') }}</td>
                                        <td>{{ $psns->status }}</td>
                                        <td>
                                            
                                            <a class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('editpesanan', $psns->id) }}" class="btn btn-sm btn-warning">Lunas</a>
                                            <form action="{{ url('/pesanan', $psns->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>                                        
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
@endsection
