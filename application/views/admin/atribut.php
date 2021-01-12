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
            <form class="form-horizontal" action="<?php echo base_url('admin/add_atribut')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Pilih Kriteria</label>
                        <div class="col-lg-8">
                            <select class="form-control" name="id_kriteria" id="id_kriteria" require>
                                <option value="">- Pilih Kriteria -</option>
                                <?php foreach ($kriteria as $row){?>
                                    <option value="<?php echo $row->kd_kriteria;?>"><?php echo $row->nama_kriteria;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Deskirpsi</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nilai</label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control" id="nilai" name="nilai">
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
            <form class="form-horizontal" action="<?php echo base_url('admin/delete_attribut')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                           <label class="col-lg-4 col-sm-4 control-label">Attribut </label>
                            <div class="col-lg-8">
                                <input type="hidden" id="id" name="id">
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
            <th>Kriteria</th>
            <th>Attribut</th>
            <th>Nilai</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo $row->nama_kriteria ;?></td>
            <td><?php echo $row->keterangan ;?></td>
            <td><?php echo $row->nilai ;?></td>
            <td>
                <a href ="<?php echo base_url('admin/form_edit_atribut/'.$row->id);?>" class="show-modal btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i> 
                </a>

                <a  href                 ="javascript:;"
                    data-id              ="<?php echo $row->id ?>"
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
         // modal delete data
          $('#delete-data').on('show.bs.modal', function (event) {
            var div     = $(event.relatedTarget)
            var modal   = $(this)
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#keterangan').attr("value",div.data('keterangan'));
           
           
        });
    });
</script>
