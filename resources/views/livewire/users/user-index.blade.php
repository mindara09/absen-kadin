<div>

	@include('livewire.users.user-create')
	@include('livewire.users.user-update')
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
	                        <th>Username</th>
	                        <th>Opsi</th>
	                    </tr>
	                </thead>
	                <tfoot>
	                    <tr>
	                        <th>Nama</th>
	                        <th>Username</th>
	                        <th>Opsi</th>
	                    </tr>
	                </tfoot>
	                <tbody>
	                	@foreach($users as $u)
	                	<tr>
	                		<td>{{ $u->name}}</td>
	                		<td>{{ $u->username}}</td>
	                		<td>
	                			<button wire:click="edit({{ $u->id}})" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update">
	                				<i class="fas fa-edit fa-sm text-white"></i>
								</button>
	                			<button wire:click="destroy({{ $u->id }})" class="btn btn-danger btn-sm">
	                				<i class="fas fa-trash fa-sm text-white"></i>
	                			</button>
	                		</td>
	                	</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
	<!-- ./Table -->

</div>
