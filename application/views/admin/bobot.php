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
            <form class="form-horizontal" action="<?php echo base_url('admin/add_bobot')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nilai bobot</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Keterangan</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
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

<!-- modal edit -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Kriteria</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/edit_bobot')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nilai bobot</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot" readonly="">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Keterangan</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <input type="submit" name="submit" class="btn btn-info" value="Simpan">
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
            <form class="form-horizontal" action="<?php echo base_url('admin/delete_bobot')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                           <label class="col-lg-4 col-sm-4 control-label">Keteragan</label>
                            <div class="col-lg-8">
                                <input type="hidden" id="nilai_bobot" name="nilai_bobot">
                                <input type="text" name="keterangan" id="keterangan" class="form-control" readonly>
                                
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
            <th>Nilai Bobot</th>
            <th>Keterangan</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo $row->nilai_bobot ;?></td>
            <td><?php echo $row->keterangan ;?></td>
            <td>
                <a  href                 ="javascript:;"
                    data-nilai_bobot     ="<?php echo $row->nilai_bobot ?>"
                    data-keterangan      ="<?php echo $row->keterangan ?>"
                    data-toggle          ="modal"
                    data-target          ="#edit-data"
                    class="show-modal btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i> 
                </a>

                <a  href                 ="javascript:;"
                    data-nilai_bobot     ="<?php echo $row->nilai_bobot ?>"
                    data-keterangan      ="<?php echo $row->keterangan ?>"
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
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div     = $(event.relatedTarget)
            var modal   = $(this)
            modal.find('#nilai_bobot').attr("value",div.data('nilai_bobot'));
            modal.find('#keterangan').attr("value",div.data('keterangan'));
           
        });

         // modal delete data
          $('#delete-data').on('show.bs.modal', function (event) {
            var div     = $(event.relatedTarget)
            var modal   = $(this)
            modal.find('#nilai_bobot').attr("value",div.data('nilai_bobot'));
            modal.find('#keterangan').attr("value",div.data('keterangan'));
           
           
        });
    });
</script>
