@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Tambah Data Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('produk') }}">Produk</a></li>
            <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Produk</h5>

        <!-- General Form Elements -->
        {{-- <form id="tambahProdukForm" method="POST" action="{{ route('/produk/storeproduk') }}" enctype="multipart/form-data"> --}}
        <form method="POST" action="{{ route('storeproduk') }}" >
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="harga" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Specification</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="spesifikasi" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputImage" class="col-sm-2 col-form-label">Picture</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="gambar" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Select Kategori</label>
                <div class="col-sm-10">
                    <select class="form-select" name="kategori_id" required>
                        <option selected disabled>Open this select Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('produk') }}" class="btn btn-secondary mx-3">Back</a>
                    <button type="submit" class="btn btn-primary mx-3">Save</button>
                </div>
            </div>
        </form><!-- End General Form Elements -->
    </div>
</div>
@endsection
