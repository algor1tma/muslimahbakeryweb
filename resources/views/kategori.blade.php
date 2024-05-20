@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Data Kategori</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('kategori') }}">Kategori</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-2">Data Kategori</h5>
                            <div class="text-center">
                                <a href="{{ route('tambahkategori') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $ktr)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ktr->name }}</td>
                                        <td>{{ $ktr->created_at }}</td>
                                        <td>
                                            <a href="{{ route('editkategori', $ktr->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ url('/kategori', $ktr->id) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-sm btn-danger delete-btn">Hapus</button>
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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Confirmation Dialog Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('.delete-form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
