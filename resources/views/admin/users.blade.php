@extends('../layouts/back')

@section('title','Absen Karyawan')

@section('content')

@livewire('users.user-index')

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