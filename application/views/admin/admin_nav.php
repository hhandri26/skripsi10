<?php 
  $active = "class='active'";
  $class = 'active'; 
?>
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
      <a href="">
        <i class="fa fa-home"></i> <span>Dashboard</span>
      </a>
      <ul class="treeview-menu <?php echo ($nav_top == 'dashboard')? $class :""; ?>">
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'home')? $active :""; ?>>
          <a href="<?php echo base_url('admin');?>">
        <i class="fa fa-home"></i> home</a></li>
      </ul>
    </li>
    
    <?php if($this->session->userdata('level') == 'admin'){;?>

    <li class="treeview <?php echo ($nav_top == 'master')? $class :""; ?>">
      <a href="#">
        <i class="fa fa-gear"></i>
        <span>Master</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'bobot')? $active :""; ?>>
          <a href="<?php echo base_url('admin/bobot');?>"><i class="fa fa-ellipsis-v"></i>Data Nilai Bobot</a>
        </li>
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'kriteria')? $active :""; ?>>
          <a href="<?php echo base_url('admin/kriteria');?>"><i class="fa fa-ellipsis-v"></i>Data Kriteria</a>
        </li>
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'atribut')? $active :""; ?>>
          <a href="<?php echo base_url('admin/atribut');?>"><i class="fa fa-ellipsis-v"></i>Data Kriteria Atribut</a>
        </li>
       
      </ul>
    </li>

    <li class="treeview <?php echo ($nav_top == 'guru')? $class :""; ?>">
      <a href="#">
        <i class="fa fa-users"></i>
        <span>Data Guru</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'guru')? $active :""; ?>>
          <a href="<?php echo base_url('admin/guru');?>"><i class="fa fa-ellipsis-v"></i>Table</a>
        </li>
      </ul>
    </li>

    <li class="treeview <?php echo ($nav_top == 'penilaian')? $class :""; ?>">
      <a href="#">
        <i class="fa fa-users"></i>
        <span>Metode Penilaian</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'nilai_saw')? $active :""; ?>>
          <a href="<?php echo base_url('admin/nilai_saw');?>"><i class="fa fa-ellipsis-v"></i>Penilaian SAW</a>
        </li>
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'nilai_topsis')? $active :""; ?>>
          <a href="<?php echo base_url('admin/nilai_topsis');?>"><i class="fa fa-ellipsis-v"></i>Penilaian Topsis</a>
        </li>
      </ul>
    </li>
    <li class="treeview <?php echo ($nav_top == 'laporan')? $class :""; ?>">
      <a href="#">
        <i class="fa fa-users"></i>
        <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'laporan')? $active :""; ?>>
          <a href="<?php echo base_url('admin/laporan');?>"><i class="fa fa-ellipsis-v"></i>laporan</a>
        </li>
       
      </ul>
    </li>
    <?php }else{ ;?>
      <li class="treeview <?php echo ($nav_top == 'laporan')? $class :""; ?>">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo (basename($_SERVER['PHP_SELF']) == 'laporan')? $active :""; ?>>
            <a href="<?php echo base_url('admin/laporan');?>"><i class="fa fa-ellipsis-v"></i>laporan</a>
          </li>
        
        </ul>
      </li>
    <?php };?>

    



</ul>