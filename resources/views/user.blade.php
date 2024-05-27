@extends('layout.app')

@section('content')
<div class="pagetitle">

    <h1>Data User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('user') }}"> User</a></li>
        </ol>
    </nav>

</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-2">Data User</h5>
                        <div class="text-center">
                            <a href="{{ route('tambahuser') }}" class="btn btn-primary">Tambah</a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">No telp</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $usr)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $usr->name }}</td>
                                <td class="text-center">{{ $usr->email }}</td>
                                <td class="text-center">{{ $usr->no_telp }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edituser', $usr->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ url('/user', $usr->id) }}" method="POST" style="display: inline;">
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
