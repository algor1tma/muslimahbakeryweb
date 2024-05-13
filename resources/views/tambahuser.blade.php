@extends('layout.app')
@section('content')
<div class="pagetitle">
    
    <h1>Tambah Data User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('user') }}"> User</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('tambahuser') }}">Tambah User</a></li>
        </ol>
    </nav>
   
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Tambah User</h5>

    <!-- General Form Elements -->
    <form method="POST" action="{{url('/user/storeuser')}}">
      @csrf <!-- Add this to include CSRF token -->
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name"> <!-- Added name attribute -->
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email"> <!-- Added name attribute -->
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">No Telp</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="no_telp"> <!-- Added name attribute -->
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password"> <!-- Added name attribute -->
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-12 text-center">
          <a href="{{ route('user') }}" class="btn btn-secondary mx-3">Back</a>
          <button type="submit" class="btn btn-primary mx-3">Save</button>
        </div>
      </div>

    </form><!-- End General Form Elements -->

  </div>
</div>

</div>


@endsection
