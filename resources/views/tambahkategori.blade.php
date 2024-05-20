@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Data Kategori</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('kategori') }}">Kategori</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('tambahkategori') }}">Tambah Kategori</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Kategori</h5>

            <!-- General Form Elements -->
            <form id="tambahKategoriForm" method="POST" action="{{ url('/kategori/storekategori') }}">
                @csrf <!-- Add this to include CSRF token -->
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name"> <!-- Added name attribute -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 text-center">
                        <a href="{{ route('kategori') }}" class="btn btn-secondary mx-3">Back</a>
                        <button type="button" class="btn btn-primary mx-3" id="saveButton">Save</button>
                    </div>
                </div>
            </form><!-- End General Form Elements -->

        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Confirmation Dialog Script -->
    <script>
        document.getElementById('saveButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save this category?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('tambahKategoriForm').submit();
                }
            });
        });
    </script>
@endsection
