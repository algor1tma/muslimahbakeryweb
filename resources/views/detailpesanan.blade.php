@extends('layout.app')
@section('content')
<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
          <h2>{{ $user->name }}</h2>
          <h3>User</h3>
          <h3>{{ $user->phone }}</h3>
          <h3>{{ $user->email }}</h3>
          <h3>{{ $user->no_telp }}</h3>
          {{-- <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div> --}}
        </div>
      </div>
    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Pesanan Details</button>
            </li>

            {{-- <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li> --}}

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <table class="table datatable">
                <thead>
                    <tr>
                        <th >No</th>
                        <th >Kue</th>
                        <th >Jumlah</th>
                        <th >Harga</th>
                        <th >Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                  @php
                    $total = 0;
                  @endphp
                  @foreach ($pesanan_details as $psndtl)
                      @php
                        $sub_total = $psndtl->qty * $psndtl->produk->harga;
                        $total += $sub_total;
                      @endphp
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $psndtl->produk->name }}</td>
                        <td>{{ $psndtl->qty }}</td>
                        <td>Rp {{ number_format($psndtl->produk->harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($sub_total, 0, ',', '.') }}</td>
                      </tr>
                  @endforeach
                  <tr>
                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                    <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
