@extends('app')
@section('content')

  <!-- Head -->
  <div class="head text-center">
    <img src="assets/img/logo.png" width="300" alt="">
    <h2 class="text-white">E-Guestbook hotel smkn 1 Surabaya</h2>
</div>
<!-- end Head -->

<!-- Awal row -->
<div class="row mt-2">
    <!-- col-lg-7 -->
    <div class="col-lg-7 mb-3">
        <div class="card shadow bg-gradient-light">
            <!-- card body -->
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>

                @endif
                <div class="">

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h1>
                        </div>
                        <form method="POST" action="{{route('admin.store')}}" enctype="multipart/form-data" class="user" action="">
                            @csrf


                            <div class="form-group">
                                @error('nama')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Pengunjung" required>
                            </div>

                            <div class="form-group">
                                @error('alamat')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                <input type="text" class="form-control form-control-user @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" required>
                            </div>

                            <div class="form-group">
                                @error('tujuan')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                <input type="text" class="form-control form-control-user @error('tujuan') is-invalid @enderror" name="tujuan" placeholder="Keperluan" required>
                            </div>

                            <div class="form-group">
                                @error('nope')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                <input type="text" class="form-control form-control-user @error('nope') is-invalid @enderror" name="nope" placeholder="No.Hp" required>
                            </div>
                            <br>


                            <button type="submit" class="btn btn-primary btn-user btn-block">Simpan Data</button>

                        </form>
                    </div>
            </div>
            <!-- end card-body -->
        </div>
    </div>
    <!-- end col-lg-7 -->

    <!-- col lg-5 -->
    <div class="col-lg-5 mb-3">
        <!-- card -->
        <div class="card shadow">
            <!-- card body -->
            <div class="card-body">
            <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                        </div>

                        <table class="table table-border">
                            <tr>
                                <td>Hari ini</td>
                                <td>{{ $count_today }}</td>
                            </tr>
                            <tr>
                                <td>Kemarin</td>
                                <td>{{ $count_yesterday }}</td>
                            </tr>
                            <tr>
                                <td>Minggu ini</td>
                                <td>{{ $count_weeks }}</td>
                            </tr>
                            <tr>
                                <td>Bulan ini</td>
                                <td>{{ $count_months }}</td>
                            </tr>
                            <tr>
                                <td>Keseluruhan</td>
                                <td>{{ $count_all }}</td>
                            </tr>
                        </table>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col lg-5 -->

</div>
<!-- end row -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari ini [<?= date('d-m-Y') ?>]</h6>
                    </div>
                    <div class="card-body">

                    <a href="{{route('rekapitulasi')}}" class="btn btn-success mb-3"> <i class="fa fa-table"> Rekap Pengunjung</i></a>
                    <a href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal" class="btn btn-danger mb-3"> <i class="fa fa-sign-out-alt"> Logout</i></a>





                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengunjung</th>
                                        <th>Tanggal</th>
                                        <th>Alamat</th>
                                        <th>Keperluan</th>
                                        <th>No.Hp</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>No</th>
                                        <th>Nama Pengunjung</th>
                                        <th>Tanggal</th>
                                        <th>Alamat</th>
                                        <th>Keperluan</th>
                                        <th>No.Hp</th>
                                    </tr>
                                </tfoot>
                                <tbody>


                                    @foreach ($data as $tamu)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle">{{$tamu->id}}</td>
                                        <td class="text-center" style="vertical-align: middle">{{$tamu->nama}}</td>
                                        <td class="text-center" style="vertical-align: middle">{{$tamu->tanggal}}</td>
                                        <td class="text-center" style="vertical-align: middle">{{$tamu->alamat}}</td>
                                        <td class="text-center" style="vertical-align: middle">{{$tamu->tujuan}}</td>
                                        <td class="text-center" style="vertical-align: middle">{{$tamu->nope}}</td>



                                    </tr>
                                    @endforeach




                                        </tbody>
                            </table>
                        </div>
                    </div>

                     <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{route('logout')}}" method="POST">
                @csrf
                <input type="submit" class="btn btn-primary" value="logout">
            </form>
            </div>
        </div>
    </div>
</div>


@endsection
