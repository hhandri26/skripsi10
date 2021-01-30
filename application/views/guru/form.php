<form class="form-horizontal" action="<?php echo base_url('admin/edit_guru')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">NIP</label>
                <div class="col-lg-8">
                    <input type="number" class="form-control" id="nik" name="nik" value="<?php echo $edit->nik;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Nama</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo $edit->nama_guru;?>">
                    <input type="hidden" name="id_guru" value="<?php echo $edit->id_guru;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Tempat Lahir</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="<?php echo $edit->tempat_tanggal_lahir;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Tanggal Lahir</label>
                <div class="col-lg-8">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"  value="<?php echo $edit->tanggal_lahir;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Alamat</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $edit->alamat;?>">
                </div>
            </div>
            
            <div class="form-group">
            <label class="col-lg-4 col-sm-4 control-label">Kehadiran</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c1" require>
                        <option value="<?php echo $edit->c1;?>"><?php echo $edit->c_1;?></option>
                        <?php foreach ($c1 as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label class="col-lg-4 col-sm-4 control-label">Sikap</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c2" require>
                        <option value="<?php echo $edit->c2;?>"><?php echo $edit->c_2;?></option>
                        <?php foreach ($c2 as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label class="col-lg-4 col-sm-4 control-label">Disiplin</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c3" require>
                        <option value="<?php echo $edit->c3;?>"><?php echo $edit->c_3;?></option>
                        <?php foreach ($c3 as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label class="col-lg-4 col-sm-4 control-label">Kemampuan Mengajar</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c4" require>
                        <option value="<?php echo $edit->c4;?>"><?php echo $edit->c_4;?></option>
                        <?php foreach ($c4 as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label class="col-lg-4 col-sm-4 control-label">Tanggung Jawab</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c5" require>
                    <option value="<?php echo $edit->c5;?>"><?php echo $edit->c_5;?></option>
                        <?php foreach ($c5 as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            
            
            
        </div>
        <div class="modal-footer">
            
            <input type="submit" name="submit" class="btn btn-info" value="Update">
        </div>
</form>