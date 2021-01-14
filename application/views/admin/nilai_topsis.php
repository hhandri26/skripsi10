<!-- modal edit -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Hitung Nilai V</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/hitung_topsis_v')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label">Nama Warga</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru">
                            <input type="hidden" class="form-control" id="id_guru" name="id_guru">
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
<form class="form-horizontal" action="<?php echo base_url('admin/hitung_topsis')?>" method="post" enctype="multipart/form-data" role="form">
    <div class="form-group">
        <div class="col-lg-8">
            <select class="form-control" name="no_peserta" require>
            <option value="">- Pilih Guru -</option>
                <?php foreach ($guru as $row){?>
                    <option value="<?php echo $row->nik;?>"><?php echo $row->nama_guru;?></option>
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
                <th>Nama Guru</th>
                <th>Kehadiran</th>
                <th>Sikap</th>
                <th>Disiplin</th>
                <th>Kemampuan Mengajar</th>
                <th>Tanggung Jawab</th>
                <th>Nilai V</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo $row->nama_guru ;?></td>
            <td><?php echo $row->result_c1 ;?></td>
            <td><?php echo $row->result_c2 ;?></td>
            <td><?php echo $row->result_c3 ;?></td>
            <td><?php echo $row->result_c4 ;?></td>
            <td><?php echo $row->result_c5 ;?></td>
            <td>
                <?php if($row->nilai_v==''){?>
                <a  href                 ="javascript:;"
                    data-nama_guru            ="<?php echo $row->nama_guru ?>"
                    data-id_guru      ="<?php echo $row->id_guru ?>"
                    data-toggle          ="modal"
                    data-target          ="#edit-data"
                    class="show-modal btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i> 
                </a>
                <?php }else{?>
                <?php echo $row->nilai_v;?>
                <?php };?>
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
            modal.find('#nama_guru').attr("value",div.data('nama_guru'));
            modal.find('#id_guru').attr("value",div.data('id_guru'));
           
        });
    });
</script>