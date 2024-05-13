@extends('layout.app')

@section('content')
<div class="pagetitle">
    
    <h1>Edit Data User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('user') }}"> User</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('edituser', $user->id) }}">Edit user</a></li>
        </ol>
    </nav>
   
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit user</h5>

    <!-- General Form Elements -->
    <form method="POST" action="{{ url("/user/{$user->id}") }}">
      @method('PUT')
      @csrf

      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" value="{{ $user->email }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">No Telp</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="no_telp" value="{{ $user->no_telp }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" name="password" value="{{ $user->password }}" id="passwordField">
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-primary" onclick="togglePasswordVisibility()">Show</button>
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

<script>
  function togglePasswordVisibility() {
    var passwordField = document.getElementById("passwordField");
    if (passwordField.type === "password") {
      passwordField.type = "text";
      document.querySelector('button[type="button"]').textContent = "Hide";
    } else {
      passwordField.type = "password";
      document.querySelector('button[type="button"]').textContent = "Show";
    }
  }
</script>

@endsection
