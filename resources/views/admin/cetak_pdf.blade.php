<center>
    <h1>Data Absen Pegawai</h1>
</center>
<h5>Export Tanggal : {{ $tanggal }}</h5>
<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th style="text-align: left; padding-left: 5%;">Nama</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Izin</th>
        </tr>
    </thead>
    <tbody>
    	@foreach($karyawan as $k)
    	<tr>
            <td style="text-align: center;">{{ $loop->iteration }}.</td>
    		<td style="padding-left: 5%;">{{ $k->name}} </td>
    		<td style="text-align: center;">
    			{{ $absen->where('user_id',$k->id)->where('type','masuk')->count()}}
    		</td>
    		<td style="text-align: center;">
    			{{ $absen->where('user_id',$k->id)->where('type','keluar')->count()}}
    		</td>
    		<td style="text-align: center;">
    			{{ $absen->where('user_id',$k->id)->where('type','izin')->count()}}
    		</td>
    	</tr>
    	@endforeach
    </tbody>
</table>