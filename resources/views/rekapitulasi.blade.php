@extends('app')
@section('content')

<!-- awal row -->
<div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekap Data Pengunjung</h6>
                </div>
                <div class="card-body">
                <form method="GET" action="{{route('rekapitulasi')}}" class="text-center">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-md-3"> </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Dari Tanggal</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" value="<?= isset($_POST['start_date']) ? $_POST['start_date'] : date('Y-m-d') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Sampai Tanggal</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date" value="<?= isset($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-d') ?>" required>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4"> </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary form-control" type="submit" ><i class="fa fa-search"> Tampilkan</i></button>

                    </div>
                    <div class="col-md-2">
                        <a href="{{route('admin')}}" class="btn btn-danger form-control"><i class="fa fa-backward"> Kembali</i></a>
                    </div>

                    </div>


                </form>

                <div class="table-responsive">
@include('table',$rekap)

                                <center>
                                    <form method="post" action="{{route('rekapitulasi.cetak')}}">
                                        @csrf
                                        <div class="col-md-3">

                                            <button class="btn btn-success form-control" name="bexport">
                                                <i class="fa fa-download"></i> Export Data Excel
                                            </button>
                                        </div>

                                    </form>
                                </center>

                            </div>

                </div>
            </div>
        </div>
    </div>
<!-- akhir row -->

@endsection
