<a href="javascript:;" class="add-modal btn btn-info btn-sm" data-toggle ="modal" data-target="#add-tb">
     <i class="fa fa-plus"></i>
</a>
<!-- modal add -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add-tb" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/add_warga')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nama</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Tempat Lahir</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Tanggal Lahir</label>
                        <div class="col-lg-8">
                            <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Alamat</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">No Handphone</label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control" id="no_tlpon" name="no_tlpon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Usia Anak</label>
                        <div class="col-lg-8">
                            <select class="form-control" name="c1" require>
                                <option value="">- Pilih Usia Anak -</option>
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
                                <option value="">- Pilih Pendidikan -</option>
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
                                <option value="">- Pilih tanggungan -</option>
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
                                <option value="">- Penghasilan -</option>
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
                                <option value="">- Pilih Luas Sawah -</option>
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
                                <option value="">- Pilih Tempat tinggal -</option>
                                <?php foreach ($tempat_tinggal as $row){?>
                                    <option value="<?php echo $row->id;?>"><?php echo $row->keterangan;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                   
                   
                </div>
                <div class="modal-footer">
                   
                    <input type="submit" name="submit" class="btn btn-info" value="Tambah">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Hapus -->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delete-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Anda Yakin Hapus Ini?</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/delete_warga')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                           <label class="col-lg-4 col-sm-4 control-label">Nama warga </label>
                            <div class="col-lg-8">
                                <input type="hidden" id="id" name="id">
                                <input type="text" name="nama" id="nama" class="form-control" readonly>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-danger" value="Hapus">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal lahir</th>
            <th>alamat</th>
            <th>No Telpon</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo $row->nama ;?></td>
            <td><?php echo $row->tempat_lhr;?></td>
            <td><?php echo $row->tanggal_lhr ;?></td>
            <td><?php echo $row->alamat ;?></td>
            <td><?php echo $row->no_tlpon ;?></td>
            <td>
                <a href ="<?php echo base_url('admin/form_edit_warga/'.$row->no_peserta);?>" class="btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i> 
                </a>

                <a  href                 ="javascript:;"
                    data-id              ="<?php echo $row->no_peserta ?>"
                    data-nama            ="<?php echo $row->nama ?>"
                    data-toggle          ="modal"
                    data-target          ="#delete-data"
                    class="show-modal btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> 
                </a>
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
         // modal delete data
          $('#delete-data').on('show.bs.modal', function (event) {
            var div     = $(event.relatedTarget)
            var modal   = $(this)
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#nama').attr("value",div.data('nama'));
           
           
        });
    });

</script>
