Laporan Tahun <?php echo date("Y"); ?><br>
<a href="<?php echo base_url('admin/cetak/saw');?>" class="btn btn-info"> Cetak PDF</a>
<div class="box-body">
    <div style="text-align: center;font-size: 20px;">
    <strong> Hasil Pengolahan Data Pemilihan Guru Terbaik Menggunakan Metode SAW</strong> 
    </div>
    <table 
    <?php 
        if($this->session->userdata('level') == 'admin'){
            echo 'id="datatable-buttons"';
        }else{
            echo 'id="example1"';
        }
    ?>
    class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Nilai SAW</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo $row->nama_guru ;?></td>
            <td><?php echo $row->nilai_saw;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

