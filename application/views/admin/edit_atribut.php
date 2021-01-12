<form class="form-horizontal" action="<?php echo base_url('admin/edit_atribut')?>" method="post" enctype="multipart/form-data" role="form">
    <div class="modal-body">
        <div class="form-group">
            <label class="col-lg-4 col-sm-4 control-label">Pilih Kriteria</label>
            <div class="col-lg-8">
                <select class="form-control" name="id_kriteria" id="id_kriteria" require>
                    <option value="<?php echo $edit->id_kriteria;?>"><?php echo $edit->nama_kriteria;?></option>
                    <?php foreach ($kriteria as $row){?>
                        <option value="<?php echo $row->kd_kriteria;?>"><?php echo $row->nama_kriteria;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 col-sm-4 control-label">Deskirpsi</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" value="<?php echo $edit->keterangan;?>" id="keterangan" name="keterangan">
                <input type="hidden" value="<?php echo $edit->id;?>" name="id">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 col-sm-4 control-label">Nilai</label>
            <div class="col-lg-8">
                <input type="number" class="form-control" id="nilai" name="nilai" value="<?php echo $edit->nilai;?>">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-info" value="Update">
    </div>
</form>