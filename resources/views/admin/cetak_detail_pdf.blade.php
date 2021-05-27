<title>DATA ABSEN RINCIAN PEGAWAI</title>

<center>
    <h2>DATA ABSEN RINCIAN PEGAWAI</h2>
</center>

<table style="border-collapse: collapse; border: 1px solid black; width: 100%">
    <thead>
        <tr>
            <th style="text-align: left; padding-left: 5%; width: 20%;">Export Tanggal </th>
            <td style="text-align: left; padding-left: 5%;">: {{ $tanggal }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding-left: 5%; width: 20%;">Nama Pegawai</th>
            <td style="text-align: left; padding-left: 5%;">: {{ $karyawan->name}}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding-left: 5%; width: 20%;">Position</th>
            <td style="text-align: left; padding-left: 5%;">: {{ $karyawan->position}}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding-left: 5%; width: 20%;">Level</th>
            <td style="text-align: left; padding-left: 5%;">: {{ $karyawan->level}}</td>
        </tr>
    </thead>
</table>
<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th style="text-align: left; padding-left: 13px;" colspan="3">Tabel Jenis Absen</th>
        </tr>
        <tr>
            <th style="text-align: left; padding-left: 5%;">Masuk</th>
            <th style="text-align: left; padding-left: 5%;">Pulang</th>
            <th style="text-align: left; padding-left: 5%;">Izin</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: left; padding-left: 5%;">{{ $absen->where('user_id', $karyawan->id)->where('type', 'masuk')->count()}} </td>
            <td style="text-align: left; padding-left: 5%;">{{ $absen->where('user_id', $karyawan->id)->where('type', 'keluar')->count()}}</td>
            <td style="text-align: left; padding-left: 5%;">{{ $absen->where('user_id', $karyawan->id)->where('type', 'izin')->count()}}</td>
        </tr>
    </tbody>
</table>
<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th style="text-align: left; padding-left: 13px;" colspan="3">Tabel Absen</th>
        </tr>
        <tr>
            <th style="text-align: left; padding-left: 13px;">Jenis</th>
            <th style="text-align: left; padding-left: 13px;">Keterangan</th>
            <th style="text-align: left; padding-left: 13px;">Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absen as $a)
        @if ( $a->user_id == $karyawan->id)
        <tr>
            <td style="text-align: left; padding-left: 13px;">{{ $a->type}}</td>
            <td style="text-align: left; padding-left: 13px;">{{ $a->explanation}}</td>
            <td style="text-align: left; padding-left: 13px;">{{ $a->created_at}}</td>
        </tr>

        @endif
        @endforeach
    </tbody>
</table>