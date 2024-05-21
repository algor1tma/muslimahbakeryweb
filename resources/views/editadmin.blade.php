@extends('layout.app')

@section('content')
    <div class="pagetitle">

        <h1>Edit Data Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('dataadmin') }}">Admin</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('editadmin', $admin->id) }}">Edit Admin</a></li>
            </ol>
        </nav>

    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Admin</h5>

            <!-- General Form Elements -->
            <form id="editAdminForm" method="POST" action="{{ url("/dataadmin/{$admin->id}") }}">
                @method('PUT')
                @csrf

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_telp" value="{{ $admin->no_telp }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" style="height: 100px" name="address">{{ $admin->address }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" value="{{ $admin->password }}"
                            id="passwordField">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" onclick="togglePasswordVisibility()">Show</button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 text-center">
                        <a href="{{ route('dataadmin') }}" class="btn btn-secondary mx-3">Back</a>
                        <button type="button" class="btn btn-primary mx-3" onclick="confirmSave()">Save</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Confirmation Dialog Script -->
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("passwordField");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                document.querySelector('button[onclick="togglePasswordVisibility()"]').textContent = "Hide";
            } else {
                passwordField.type = "password";
                document.querySelector('button[onclick="togglePasswordVisibility()"]').textContent = "Show";
            }
        }

        function confirmSave() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save the changes?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editAdminForm').submit();
                }
            });
        }
    </script>
@endsection
