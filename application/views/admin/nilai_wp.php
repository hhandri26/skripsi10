<!-- modal edit -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Hitung Nilai V</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/hitung_wp_v')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nama Warga</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama" name="nama">
                            <input type="hidden" class="form-control" id="no_peserta" name="no_peserta">
                            <input type="hidden" class="form-control" id="nilai_s" name="nilai_s">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-info" value="hitung">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="box-body">
<form class="form-horizontal" action="<?php echo base_url('admin/hitung_wp')?>" method="post" enctype="multipart/form-data" role="form">
    <div class="form-group">
        <div class="col-lg-8">
            <select class="form-control" name="no_peserta" require>
            <option value="">- Pilih Warga -</option>
                <?php foreach ($warga as $row){?>
                    <option value="<?php echo $row->no_peserta;?>"><?php echo $row->nama;?></option>
                <?php }?>
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-info" value="Hitung">
    </div>
   
</form>
</div>
<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Rangking</th>
                <th>Kode A</th>
                <th>Nama</th>
                <th>Nilai S</th>
                <th>Nilai V</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo 'A'.$row->no_peserta ;?></td>
            <td><?php echo $row->nama ;?></td>
            <td><?php echo $row->nilai_s ;?></td>
            <td><?php echo $row->nilai_v ;?></td>
            <td>
                <?php if($row->nilai_v==''){?>
                <a  href                 ="javascript:;"
                    data-nama            ="<?php echo $row->nama ?>"
                    data-no_peserta      ="<?php echo $row->no_peserta ?>"
                    data-nilai_s         ="<?php echo $row->nilai_s ?>"
                    data-toggle          ="modal"
                    data-target          ="#edit-data"
                    class="show-modal btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i> 
                </a>
                <?php }?>
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
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#no_peserta').attr("value",div.data('no_peserta'));
            modal.find('#nilai_s').attr("value",div.data('nilai_s'));
           
        });
    });
</script>