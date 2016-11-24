<div class="agile-grids">
    <div class="agile-tables" style="min-height: 600px;"><!-- tables -->
        <div id="w3l-table-info">
            <h3>Data Pegawai
            </h3>
            <div class="panel-body">
                <div class="messages"></div>
                <button type="button" class="btn pull pull-right bg-primary" style="color: white;" data-toggle="modal" data-target="#addMemberPegawai" onclick="addMemberModelPegawai()">
                    Tambah Pegawai
                </button>
                <table class="table table-hover" id="manageMemberTablePegawai">
                    <thead>
                        <tr style="background-color: #e74c3c;">
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Kota</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <a href="<?php echo base_url().'pegawai/eksporFile';?>" style="color: black;" >
                <button type="button" class="btn pull pull-left bg-success" >
                    Expor
                </button>
            </a>
            <!-- add member -->
            <div class="modal fade" tabindex="-1" role="dialog" id="addMemberPegawai">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Pegawai</h4>
                        </div>
                        <form method="post" action="<?php echo base_url().'pegawai/createPegawai';?>" id="createFormPegawai">
                            <div class="modal-body">        
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai">
                                </div>
                                <div class="form-group">
                                    <label for="nama_pegawai">Telepon</label>
                                    <input type="text" class="form-control" id="tlp_pegawai" name="tlp_pegawai" placeholder="081xxxx">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Kelamin</label><br>
                                    <div class="">
                                        <label for="" class="radio-inline">
                                            <input type="radio" name="id_jk" value='1' id="id_jk"> Laki-laki
                                        </label>
                                        <label for="" class="radio-inline">
                                            <input type="radio" name="id_jk" value='2' id="id_jk"> Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pegawai">Kota</label><br>
                                    <select name="id_kota" id="id_kota" class="form-control">
                                    <?php foreach($dataKota as $kota){ ?>
                                        <option value="<?php echo $kota['id_kota']?>"><?php echo $kota['nama_kota']?></option>
                                    <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_posisi">Posisi</label><br>
                                    <select name="id_posisi" id="id_posisi" class="form-control">
                                    <?php foreach($dataPosisi as $posisi){ ?>
                                        <option value="<?php echo $posisi['id_posisi']?>"><?php echo $posisi['nama_posisi']?></option>
                                    <?php }?>
                                    </select>
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
            <div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModalPegawai">
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
                            <button type="button" id="removeMemberBtnPegawai" class="btn btn-primary">Hapus</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- removeMember -->
            <!-- edit member -->
            <div class="modal fade" tabindex="-1" role="dialog" id="editMemberModalPegawai">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Member</h4>
                        </div>
                        <form method="post" action="<?php echo base_url().'pegawai/editPegawai';?>" id="editFormPegawai">

                            <div class="modal-body">       
                                <div class="form-group">
                                    <label>Nama Pegawai</label>
                                    <input type="text" class="form-control" id="editNama_pegawai" name="editNama_pegawai" placeholder="Nama Pegawai">
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" class="form-control" id="editTlp_pegawai" name="editTlp_pegawai" placeholder="087xxxx">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Kelamin</label><br>
                                    <div class="">
                                        <label for="" class="radio-inline">
                                            <input type="radio" name="editId_jk" value='1' id="editId_jk" > Laki-laki
                                        </label>
                                        <label for="" class="radio-inline">
                                            <input type="radio" name="editId_jk" value='2' id="editId_jk" > Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kota</label><br>
                                    <select name="editId_kota" id="editId_kota" class="form-control">
                                    <?php foreach($dataKota as $kota){ ?>
                                        <option value="<?php echo $kota['id_kota']?>" <?php if($dataPegawai[0]['id_kota']==$kota['id_kota']){echo "selected='selected'";} ?> ><?php echo $kota['nama_kota']?></option>
                                    <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Posisi</label><br>
                                    <select name="editId_posisi" id="editId_posisi" class="form-control">
                                        <?php foreach($dataPosisi as $posisi){ ?>
                                        <option value="<?php echo $posisi['id_posisi']?>" <?php if($dataPegawai[0]['id_posisi']==$posisi['id_posisi']){echo "selected=selected";} ?> ><?php echo $posisi['nama_posisi']?></option>
                                        <?php }?>
                                    </select>
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