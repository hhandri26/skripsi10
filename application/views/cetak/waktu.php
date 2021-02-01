<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:100%;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
    .wrapper{
      display: flex;

    }
    .text{
      position: absolute; 
      font-size: 20px; 
      padding: 30px 40px 40px 150px;
    text-align: CENTER;

    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="logo">
    <img src="<?php echo base_url('assets/img/logo.jpg');?>" width="70"  alt="">
    </div>
    <div class="text">
      <span>
      Perbandingan Kecepatan Waktu Proses Pengolahan Data Pemilihan Guru Terbaik
      <br>
       Antara Metode SAW dengan Metode Topsis
     


      </span>
    </div>
    <br>
  </div>
    
   
  </div>
	<div id="outtable">
	  <table>
	  	<thead>
	  		<tr>
	  			<th class="short">No</th>
	  			<th class="normal">Nama Guru</th>
	  			<th class="normal">Waktu SAW</th>
          <th class="normal">Waktu Topsis</th>
          <th class="normal">Selisih Waktu</th>
	  		</tr>
	  	</thead>
	  	<tbody>
        <?php 
            $no=1; 
            $total_wp = 0;
            $total_topsis = 0; 
            $total_selisih_waktu = 0;
        ?>
	  		<?php foreach($table as $row): ?>
	  		  <tr>
	  			<td><?php echo $no++; ?></td>
	  			<td><?php echo $row->nama_guru ;?></td>
            <td><?php echo $row->waktu_wp;?></td>
            <td><?php echo $row->waktu_topsis;?></td>
            <td><?php echo $row->waktu_wp - $row->waktu_topsis;?>
          
	  		  </tr>
        <?php 
          $total_wp +=$row->waktu_wp;
          $total_topsis +=$row->waktu_topsis;
          $total_selisih_waktu +=$row->waktu_wp - $row->waktu_topsis;
        ?>
	  		<?php endforeach; ?>
	  	</tbody>
      <tfoot>
            <tr>
                <td>Waktu Rata - rata</td>
                <td></td>
                <td><?php echo $total_wp / $no;?></td>
                <td><?php echo $total_topsis / $no;?></td>
                <td><?php echo $total_selisih_waktu / $no;?></td>
            </tr>
        </tfoot>
	  </table>
	 </div>
</body>
</html>