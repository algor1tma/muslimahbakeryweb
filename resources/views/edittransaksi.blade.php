@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Edit Status</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('transaksi') }}">transaksi</a></li>
            <li class="breadcrumb-item active">Edit Status</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit Product</h5>

    <!-- General Form Elements -->
    <form method="POST" action="{{ route('updatetransaksi', $pesanans->id) }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf

      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Tanggal transaksi</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="tanggal" value="{{ $pesanans->created_at }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="{{ $pesanans->user->name }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="harga" value="{{ $pesanans->total_harga }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="status" value="{{ $pesanans->kirim->status }}">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-12 text-center">
          <a href="{{ route('transaksi') }}" class="btn btn-secondary mx-3">Back</a>
          <button type="submit" class="btn btn-primary mx-3">Save</button>
        </div>
      </div>

    </form><!-- End General Form Elements -->

  </div>
</div>
@endsection
