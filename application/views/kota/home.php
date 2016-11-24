<div class="agile-grids">
	<div class="agile-tables" style="min-height: 600px;"><!-- tables -->
		<div id="w3l-table-info">
			<h3>Data Kota
			</h3>
			<div class="panel-body">
				<div class="messages"></div>
				<button type="button" class="btn pull pull-right bg-primary" style="color: white;" data-toggle="modal" data-target="#addMemberKota" onclick="addMemberModelKota()">
					Tambah Kota
				</button>
				<table class="table table-hover" id="manageMemberTableKota">
					<thead>
						<tr style="background-color: #e74c3c;">
							<th>Kota</th>
							<th>Aksi</th>
						</tr>
					</thead>
				</table>
			</div>
				
			<a href="<?php echo base_url().'kota/eksporFile';?>" style="color: black;" >
				<button type="button" class="btn pull pull-left bg-success" >
					Expor
				</button>
			</a>
				
			<!-- add member -->
			<div class="modal fade" tabindex="-1" role="dialog" id="addMemberKota">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah Kota</h4>
						</div>
						<form method="post" action="<?php echo base_url().'kota/createKota';?>" id="createFormKota">
							<div class="modal-body">        
								<div class="form-group">
									<label for="nama_kota">Nama Kota</label>
									<input type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Nama Kota">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /add mmebers -->
			<!-- removeMember -->
			<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModalKota">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							<p>Apakah anda ingin menghapus data ini?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
							<button type="button" id="removeMemberBtnKota" class="btn btn-primary">Hapus</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- removeMember -->
			<!-- edit member -->
			<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModalKota">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Edit Member</h4>
						</div>
						<form method="post" action="<?php echo base_url().'kota/editKota';?>" id="editFormKota">
							<div class="modal-body">        
								<div class="form-group">
									<label for="nama_kota">Nama Kota</label>
									<input type="text" class="form-control" id="editNama_kota" name="editNama_kota" placeholder="Nama Kota">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /edit mmebers -->
		</div><!-- //tables -->
</div><!-- //agile-grids -->