@extends('layout.app')
@section('content')
<div class="pagetitle">
    
    <h1>Laporan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('laporan') }}"> Laporan</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-2">Laporan</h5>
                        <div class="text-center">
                            <a id="printBtn" class="btn btn-primary">Print</a>
                        </div>
                    </div>
                    


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th><b>Name</b></th>
                                <th>Ext.</th>
                                <th>City</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                <th>Completion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data rows go here -->
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

<script>
    // Function to handle printing
    function printReport() {
        // Hide non-table elements
        document.body.style.display = 'none';
        document.getElementsByTagName('section')[0].style.display = 'block';
        document.getElementsByClassName('pagetitle')[0].style.display = 'block';

        // Print the table
        window.print();

        // Restore display of non-table elements
        document.body.style.display = 'block';
        document.getElementsByTagName('section')[0].style.display = 'block';
        document.getElementsByClassName('pagetitle')[0].style.display = 'block';
    }

    // Add click event listener to print button
    document.getElementById('printBtn').addEventListener('click', printReport);
</script>

@endsection
