Laporan Tahun <?php echo date("Y"); ?>
<br>
<a href="<?php echo base_url('admin/cetak/waktu');?>" class="btn btn-info">Cetak PDF</a>
<div class="box-body">
    <div style="text-align: center;font-size: 30px;">
        <strong> Perbandingan Kecepatan Waktu Proses Pengolahan Data Pemilihan Guru Terbaik Antara Metode SAW dengan Metode Topsis</strong> 
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
                <th>Waktu SAW</th>
                <th>Waktu Topsis</th>
                <th>Selisih Waktu</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $no=1;
            $total_wp = 0;
            $total_topsis = 0; 
            $total_selisih_waktu = 0;
            foreach ($table as $row ) {?>
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo $row->nama_guru ;?></td>
            <td><?php echo $row->waktu_wp;?></td>
            <td><?php echo $row->waktu_topsis;?>
            <td><?php echo abs($row->waktu_wp - $row->waktu_topsis);?>
           </td>
            </tr>
        <?php 
        $total_wp +=$row->waktu_wp;
        $total_topsis +=$row->waktu_topsis;
        $total_selisih_waktu +=$row->waktu_wp - $row->waktu_topsis;
    
        } ?>
        </tbody>
        <tfoot>
            <tr>
                <td>Waktu Rata - rata</td>
                <td></td>
                <td><?php echo $total_wp / $no;?></td>
                <td><?php echo $total_topsis / $no;?></td>
                <td><?php echo abs($total_selisih_waktu / $no);?></td>
            </tr>
        </tfoot>
    </table>
</div>

