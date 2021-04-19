@extends('../layouts/back')

@section('title','Detail Absen Karyawan')

@section('content')

<!-- Dashboard Karyawan -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Detail Absen Karyawan</h1>
</div>


<div class="row">
    <div class="col-sm-4">
        <div class="card shadow mb-4">
            <!-- Card Hesader - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Masuk : <?= $absen->where('type','masuk')->where('user_id', $karyawan->id)->count() ?>
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Keluar :<?= $absen->where('type','keluar')->where('user_id', $karyawan->id)->count() ?>
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Izin : <?= $absen->where('type','izin')->where('user_id', $karyawan->id)->count() ?>
                    </span>
                </div>
                <hr>
                <center>
                    <h5>{{$karyawan->name}}</h5>
                    <p>{{$karyawan->position}}</p>
                    <p>{{$karyawan->id}}</p>
                </center>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Absen</h6>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table no-table-bordered" id="dataAbsen" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($absen as $a)
                            @if ( $a->user_id == $karyawan->id)
                            <tr>
                                @if ($a->type == 'masuk')
                                <td class="text-success">{{ $a->type}}</td>
                                @elseif ($a->type == 'keluar')
                                <td class="text-danger">{{ $a->type}}</td>
                                @else
                                <td class="text-warning">{{ $a->type}}</td>
                                @endif
                                <td>{{ $a->explanation}}</td>
                                <td>{{ $a->created_at}}</td>
                            </tr>

                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table -->	

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

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Masuk", "Keluar", "Izin"],
    datasets: [{
      data: [<?= $absen->where('type','masuk')->where('user_id', $karyawan->id)->count() ?>, <?= $absen->where('type','keluar')->where('user_id', $karyawan->id)->count() ?>, <?= $absen->where('type','izin')->where('user_id', $karyawan->id)->count() ?>],
      backgroundColor: ['#1cc88a', '#e74a3b', '#f6c23e'],
      hoverBackgroundColor: ['#1cc88a', '#e74a3b', '#f6c23e']
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


</script>
@endsection