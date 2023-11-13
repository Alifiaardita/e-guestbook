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

    <tbody>

        @foreach ($rekap as $tamu)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$tamu->nama}}</td>
            <td>{{$tamu->tanggal}}</td>
            <td>{{$tamu->alamat}}</td>
            <td>{{$tamu->tujuan}}</td>
            <td>{{$tamu->nope}}</td>

        </tr>

        @endforeach





    </tbody>
</table>
