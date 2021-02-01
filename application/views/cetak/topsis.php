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
      background-color: #005e90;
    color: #fff;
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
      Hasil Pengolahan Data Pemilihan Guru Terbaik Menggunakan Metode Topsis
     


      </span>
    </div>
  </div>
    
   
  </div>
	<div id="outtable">
	  <table>
	  	<thead>
	  		<tr>
	  			<th class="short">No</th>
	  			<th class="normal">Nama Guru</th>
	  			<th class="normal">Nilai Topsis</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php $no=1; ?>
	  		<?php foreach($table as $row): ?>
	  		  <tr>
	  			<td><?php echo $no; ?></td>
	  			<td><?php echo $row->nama_guru; ?></td>
	  			<td><?php echo $row->nilai_v; ?></td>
          
	  		  </tr>
	  		<?php $no++; ?>
	  		<?php endforeach; ?>
	  	</tbody>
	  </table>
	 </div>
</body>
</html>