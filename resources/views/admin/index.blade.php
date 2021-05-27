@extends('../layouts/back')

@section('title','Absen Karyawan')

@section('content')

<!-- Dashboard Karyawan -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Absen Karyawan</h1>
    <div class="ml-auto">
    	<a href="{{ url('/dashboard/cetak_pdf')}}" class="btn btn-primary btn-md">Export PDF</a>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Absen Masuk Karyawan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $absen->where('type','masuk')->count()}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chevron-down fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Absen Keluar Karyawan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $absen->where('type','keluar')->count()}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chevron-up fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Absen Izin Karyawan
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $absen->where('type','izin')->count()}} </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Karyawan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $karyawan->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ./Content Row -->

<!-- Table -->	
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Absen Karyawan</h6>
    </div>
    <div class="card-body">
    	@if ($errors->any())
		    <div class="container">
		        <div class="alert alert-danger">
		            <ul>
		                @foreach ($errors->all() as $error)
		                    <li>{{ $error }}</li>
		                @endforeach
		            </ul>
		        </div>
		    </div>
		@elseif (session('hapus'))
			<div class="alert alert-success">
				{{ session('hapus')}}
			</div>
		@elseif (session('berhasil'))
			<div class="alert alert-success">
				{{ session('berhasil')}}
			</div>
		@elseif (session('gagal_hapus'))
			<div class="alert alert-danger">
				{{ session('gagal_hapus')}}
			</div>
		@endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataAbsen" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Izin</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Izin</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
                <tbody>
                	@foreach($karyawan as $k)
                	<tr>
                		<td>{{ $k->name}} </td>
                		<td>
                			{{ $absen->where('user_id',$k->id)->where('type','masuk')->count()}}
                		</td>
                		<td>
                			{{ $absen->where('user_id',$k->id)->where('type','keluar')->count()}}
                		</td>
                		<td>
                			{{ $absen->where('user_id',$k->id)->where('type','izin')->count()}}
                		</td>
                		<td>
                			<a href="{{ url('/absen')}}/{{ $k->id}}" class="btn btn-primary btn-sm">
                				<i class="fas fa-eye fa-sm text-white"></i>&nbsp; Lihat
                			</a>
                            <a href="{{ url('/dashboard/cetak_pdf')}}/{{ $k->id}}" class="btn btn-warning btn-sm">
                                <i class="fas fa-eye fa-sm text-white"></i>&nbsp; Export PDF
                            </a>
                		</td>
                	</tr>
                	@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ./Table -->

@endsection
@section('js')
<script type="text/javascript">
	
// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataAbsen').DataTable();
});
</script>
<script type="text/javascript">
window.livewire.on('addKaryawan', () => {
    $('#addKaryawan').modal('hide');
});

window.livewire.on('update', () => {
    $('#update').modal('hide');
});

</script>
@endsection