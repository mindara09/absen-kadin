@extends('../layouts/back')

@section('title','Karyawan')

@section('content')

@livewire('karyawan.karyawan-indeks')

@endsection
@section('js')
<script type="text/javascript">
	
// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataKaryawan').DataTable();
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
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection