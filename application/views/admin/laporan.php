<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Nilai Saw</th>
                <th>Waktu Saw</th>
                <th>Nilai Topsis</th>
                <th>Waktu Topsis</th>
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
            <td>
               
                <?php echo $row->waktu_wp;?>
            </td>
            <td>
               
                <?php echo $row->nilai_v;?>
            </td>
            <td>
               
               <?php echo $row->waktu_topsis;?>
           </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

