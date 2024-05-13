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
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No telp</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $usr)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->no_telp }}</td>
                                <td>{{ $usr->created_at }}</td>
                                <td>
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
