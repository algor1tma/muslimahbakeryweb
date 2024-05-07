@extends('layout.app')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title --> --}}

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-2">Data admin</h5>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                        
                        
                        


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <b>N</b>ame
                                    </th>
                                    <th>foto</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
