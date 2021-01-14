
<div class="box-body">
<form class="form-horizontal" action="<?php echo base_url('admin/hitung_saw')?>" method="post" enctype="multipart/form-data" role="form">
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
                <th>Nilai Saw</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo $row->nama_guru ;?></td>
          
            <td>
               
                <?php echo $row->nilai_saw;?>
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

