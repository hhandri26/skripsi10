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
            <form class="form-horizontal" action="<?php echo base_url('admin/add_kriteria')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nama Kriteria</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nilai Bobot</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot">
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
            <form class="form-horizontal" action="<?php echo base_url('admin/edit_kriteria')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nama Kriteria</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
                            <input type="hidden" class="form-control" id="kd_kriteria" name="kd_kriteria">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nilai Bobot</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot">
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
            <form class="form-horizontal" action="<?php echo base_url('admin/delete_kriteria')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                           <label class="col-lg-4 col-sm-4 control-label">Nama Kriteria</label>
                            <div class="col-lg-8">
                                <input type="hidden" id="kd_kriteria" name="kd_kriteria">
                                <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" readonly>
                                
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
            <th>Kode Kriteria</th>
            <th>Nama Kriteria</th>
            <th>Nilai Bobot</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo 'C'.$row->kd_kriteria ;?></td>
            <td><?php echo $row->nama_kriteria ;?></td>
            <td><?php echo $row->nilai_bobot ;?></td>
            <td>
                <a  href                 ="javascript:;"
                    data-kd_kriteria     ="<?php echo $row->kd_kriteria ?>"
                    data-nama_kriteria   ="<?php echo $row->nama_kriteria ?>"
                    data-nilai_bobot     ="<?php echo $row->nilai_bobot ?>"
                    data-toggle          ="modal"
                    data-target          ="#edit-data"
                    class="show-modal btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i> 
                </a>

                <a  href                 ="javascript:;"
                    data-kd_kriteria     ="<?php echo $row->kd_kriteria ?>"
                    data-nama_kriteria   ="<?php echo $row->nama_kriteria ?>"
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
            modal.find('#kd_kriteria').attr("value",div.data('kd_kriteria'));
            modal.find('#nama_kriteria').attr("value",div.data('nama_kriteria'));
            modal.find('#nilai_bobot').attr("value",div.data('nilai_bobot'));
           
        });

         // modal delete data
          $('#delete-data').on('show.bs.modal', function (event) {
            var div     = $(event.relatedTarget)
            var modal   = $(this)
            modal.find('#kd_kriteria').attr("value",div.data('kd_kriteria'));
            modal.find('#nama_kriteria').attr("value",div.data('nama_kriteria'));
           
           
        });
    });
</script>
