<div class="agile-grids">
	<div class="agile-tables" style="min-height: 600px;"><!-- tables -->
		<div id="w3l-table-info">
			<h3>Data Posisi
			</h3>
			<div class="panel-body">
				<div class="messages"></div>
				<button type="button" class="btn pull pull-right bg-primary" style="color: white;" data-toggle="modal" data-target="#addMemberPosisi" onclick="addMemberModelPosisi()">
					Tambah Posisi
				</button>
				<table class="table table-hover" id="manageMemberTablePosisi">
					<thead>
						<tr style="background-color: #e74c3c;">
							<th>Posisi</th>
							<th>Aksi</th>
						</tr>
					</thead>
				</table>
			</div>
			<a href="<?php echo base_url().'posisi/eksporFile';?>" style="color: black;" >
				<button type="button" class="btn pull pull-left bg-success" >
					Expor
				</button>
			</a>
			<!-- add member -->
			<div class="modal fade" tabindex="-1" role="dialog" id="addMemberPosisi">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah Posisi</h4>
						</div>
						<form method="post" action="<?php echo base_url().'posisi/createPosisi';?>" id="createFormPosisi">
							<div class="modal-body">        
								<div class="form-group">
									<label for="nama_posisi">Nama Posisi</label>
									<input type="text" class="form-control" id="nama_posisi" name="nama_posisi" placeholder="Nama Posisi">
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
			<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModalPosisi">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							<p>Do you really want to remove ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
							<button type="button" id="removeMemberBtnPosisi" class="btn btn-primary">Hapus</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- removeMember -->
			<!-- edit member -->
			<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModalPosisi">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Edit Member</h4>
						</div>
						<form method="post" action="<?php echo base_url().'posisi/editPosisi';?>" id="editFormPosisi">
							<div class="modal-body">        
								<div class="form-group">
									<label for="nama_posisi">Nama Posisi</label>
									<input type="text" class="form-control" id="editNama_posisi" name="editNama_posisi" placeholder="Nama Posisi">
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