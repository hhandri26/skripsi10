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
            <form class="form-horizontal" action="<?php echo base_url('admin/add_guru')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">NIP</label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control" id="nik" name="nik">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nama</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Tempat Lahir</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Jenis Kelamin</label>
                        <div class="col-lg-8">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Tanggal Lahir</label>
                        <div class="col-lg-8">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Alamat</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Kehadiran</label>
                        <div class="col-lg-8">
                            <select class="form-control" name="c1" require>
                                <option value="">- Pilih kehadiran -</option>
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
                                <option value="">- Pilih Sikap -</option>
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
                                <option value="">- Pilih Disiplin -</option>
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
                                <option value="">- Pilih Kemampuan Mengajar -</option>
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
                                <option value="">- Pilih Tanggung jawab -</option>
                                <?php foreach ($c5 as $row){?>
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
            <form class="form-horizontal" action="<?php echo base_url('admin/delete_guru')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                           <label class="col-lg-4 col-sm-4 control-label">Nama Guru </label>
                            <div class="col-lg-8">
                                <input type="hidden" id="id" name="id">
                                <input type="text" name="nama_guru" id="nama_guru" class="form-control" readonly>
                                
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

<!-- modal view -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="view-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Lihat Data</h4>
            </div>
            <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">NIP</label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control" id="nik" name="nik" readonly="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nama</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru" readonly="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Tempat Lahir</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" readonly="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Jenis Kelamin</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly="">
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Tanggal Lahir</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" readonly="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Alamat</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="alamat" name="alamat" readonly="">
                        </div>
                    </div>
                  
                   
                    </div>
                    <div class="modal-footer">
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
            <th>NIP</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal lahir</th>
            <th>Alamat</th>
            
            <th style="width:100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            
            <td><?php echo $row->nik ;?></td>
            <td><?php echo $row->nama_guru ;?></td>
            <td><?php echo $row->tempat_tanggal_lahir;?></td>
            <td><?php echo $row->tanggal_lahir ;?></td>
            <td><?php echo $row->alamat ;?></td>
            <td>
                <a href ="<?php echo base_url('admin/form_edit_guru/'.$row->id);?>" class="btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i> 
                </a>

                <a  href                        ="javascript:;"
                    data-id                     ="<?php echo $row->id ?>"
                    data-nik                    ="<?php echo $row->nik ?>"
                    data-nama_guru              ="<?php echo $row->nama_guru ?>"
                    data-tempat_tanggal_lahir   ="<?php echo $row->tempat_tanggal_lahir ?>"
                    data-jenis_kelamin          ="<?php echo $row->jenis_kelamin ?>"
                    data-tanggal_lahir          ="<?php echo $row->tanggal_lahir ?>"
                    data-alamat                 ="<?php echo $row->alamat ?>"
                    data-toggle                 ="modal"
                    data-target                 ="#view-data"
                    class="show-modal btn btn-info btn-sm">
                    <i class="fa fa-eye"></i> 
                </a>

                <a  href                 ="javascript:;"
                    data-id              ="<?php echo $row->nik ?>"
                    data-nama_guru            ="<?php echo $row->nama_guru ?>"
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
            modal.find('#nama_guru').attr("value",div.data('nama_guru'));
           
           
        });

        $('#view-data').on('show.bs.modal', function (event) {
            var div     = $(event.relatedTarget)
            var modal   = $(this)
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#nik').attr("value",div.data('nik'));
            modal.find('#nama_guru').attr("value",div.data('nama_guru'));
            modal.find('#tempat_tanggal_lahir').attr("value",div.data('tempat_tanggal_lahir'));
            modal.find('#jenis_kelamin').attr("value",div.data('jenis_kelamin'));
            modal.find('#tanggal_lahir').attr("value",div.data('tanggal_lahir'));
            modal.find('#alamat').attr("value",div.data('alamat'));
           
           
        });
    });

</script>
