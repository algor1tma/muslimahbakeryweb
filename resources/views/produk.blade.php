@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Data Product</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('produk') }}">Data Product</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-2">Data Product</h5>
                        <div class="text-center">
                            <a href="{{ route('tambahproduk') }}" class="btn btn-primary">Tambah</a>
                        </div>
                    </div>
                    
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Specification</th>
                                <th>Picture</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $prdk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prdk->name }}</td>
                                <td>{{ $prdk->harga }}</td>
                                <td>{{ $prdk->spesifikasi }}</td>
                                <td>
                                    <img src="{{ asset($prdk->gambar) }}" alt="{{ $prdk->gambar }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $prdk->kategori->name }}</td>                            
                                <td>
                                    <a href="{{ route('editproduk', $prdk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ url('/produk', $prdk->id) }}" method="POST" style="display: inline;">
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
