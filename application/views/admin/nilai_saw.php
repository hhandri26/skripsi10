<div class="box-body">
<form class="form-horizontal" action="<?php echo base_url('admin/hitung_saw')?>" method="post" enctype="multipart/form-data" role="form">
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
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo 'A'.$row->no_peserta ;?></td>
            <td><?php echo $row->nama ;?></td>
            <td><?php echo $row->nilai_saw ;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>