<form class="form-horizontal" action="<?php echo base_url('admin/edit_warga')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Nama</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $edit->nama;?>">
                    <input type="hidden" name="id_warga" value="<?php echo $edit->id_warga;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Tempat Lahir</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr" value="<?php echo $edit->tempat_lhr;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Tanggal Lahir</label>
                <div class="col-lg-8">
                    <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr"  value="<?php echo $edit->tanggal_lhr;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Alamat</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $edit->alamat;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">No Handphone</label>
                <div class="col-lg-8">
                    <input type="number" class="form-control" id="no_tlpon" name="no_tlpon" value="<?php echo $edit->no_tlpon;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Usia Anak</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c1" require>
                        <option value="<?php echo $edit->c1;?>"><?php echo $edit->keterangan_anak;?></option>
                        <?php foreach ($usia_anak as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Pendidikan</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c2" require>
                        <option value="<?php echo $edit->c2;?>"><?php echo $edit->keterangan_pendidikan;?></option>
                        <?php foreach ($pendidikan as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Tanggungan</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c3" require>
                        <option value="<?php echo $edit->c3;?>"><?php echo $edit->keterangan_tanggungan;?></option>
                        <?php foreach ($tanggungan as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Penghasilan</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c4" require>
                        <option value="<?php echo $edit->c4;?>"><?php echo $edit->keterangan_penghasilan;?></option>
                        <?php foreach ($penghasilan as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Luas sawah</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c5" require>
                    <option value="<?php echo $edit->c5;?>"><?php echo $edit->keterangan_sawah;?></option>
                        <?php foreach ($luas_sawah as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 col-sm-4 control-label">Tempat Tinggal</label>
                <div class="col-lg-8">
                    <select class="form-control" name="c6" require>
                        <option value="<?php echo $edit->c6;?>"><?php echo $edit->keterangan_tinggal;?></option>
                        <?php foreach ($tempat_tinggal as $row){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            
            
        </div>
        <div class="modal-footer">
            
            <input type="submit" name="submit" class="btn btn-info" value="Tambah">
        </div>
</form>