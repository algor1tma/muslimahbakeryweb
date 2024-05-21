@extends('layout.app')
@section('content')
<div class="pagetitle">
    
    <h1>Tambah Data Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('produk') }}"> produk</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('tambahproduk') }}">Tambah Produk</a></li>
        </ol>
    </nav>
   
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Tambah produk</h5>

    <!-- General Form Elements -->
    <form method="POST" action="{{url('/produk/storeproduk')}}">
      @csrf <!-- Add this to include CSRF token -->
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="harga">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Specification</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="spesifikasi">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputImage" class="col-sm-2 col-form-label">Picture</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="gambar">
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

</div>


@endsection
