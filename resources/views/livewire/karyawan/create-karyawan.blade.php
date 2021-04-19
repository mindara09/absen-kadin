<div>

<!-- Dashboard Karyawan -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Karyawan</h1>
    <a href="#addKaryawan" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah data karyawan</a>
</div>

<!-- Modal -->
<div wire:ignore class="modal fade" id="addKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form wire:submit.prevent="save" >
	      <div class="modal-body">
	        	<div class="form-group">
				    <label>Nama Lengkap</label>
				    <input type="text" wire:model="name" class="form-control" placeholder="Isi nama lengkap..">
			 	</div>
		     	<div class="form-group">
				    <label>Jabatan</label>
				    <input type="text" wire:model="position" class="form-control" placeholder="Isi jabatan..">
			  	</div>
		     	<div class="form-group">
				    <label>Level</label>
				    <select class="form-control" wire:model="level" >
				    	<option selected="">Pilih level..</option>
				    	<option value="admin">Administrator</option>
				    	<option value="karyawan">Karyawan</option>
				    </select>
			  	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button class="btn btn-primary">Save changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>

</div>
