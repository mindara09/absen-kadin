<div>
	<!-- Modal -->
	<div wire:ignore class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div> 
		      <div class="modal-body">
		      	  	<input type="hidden" wire:model="selected_id">
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
		        <button class="btn btn-primary" wire:click="update()">Save changes</button>
		      </div>
	    </div>
	  </div>
	</div>
</div>
