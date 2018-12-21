<?php include "../config.php"; ?>
<?php include "template/header.php" ?>
<?php include "template/sidebar.php" ?>
<?php include('tambah_modalperbaikan.php'); ?>
    <body>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Data Perbaikan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
    <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Perbaikan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <span class="pull-left"><a href="#tambah_perbaikan" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah Perbaikan</a></span>     
    <span class="pull-right"><a href="ekspor_pdf_perbaikan.php" target="blank" class="btn btn-primary"><span class="fa fa-download"></span>&nbsp; Ekspor Perbaikan</a></span>
  <div style="height:50px;"></div>
  <div class="box-body table-responsive">
        <table id="keluhantable" class="table table-bordered table-striped">
      <thead>
        <th>Pelanggan</th>
        <th>Keluhan</th>
        <th>Teknisi</th>
        <th>Perbaikan</th>
        <th>Tgl Perbaikan</th>
        <th>Action</th>
      </thead>
      <tbody>
      <?php
        $query=mysqli_query($conn,"select * from perbaikan INNER JOIN pelanggan ON perbaikan.idpelanggan = pelanggan.idpelanggan INNER JOIN keluhan ON perbaikan.idkeluhan = keluhan.idkeluhan INNER JOIN teknisi ON perbaikan.idteknisi = teknisi.idteknisi ");
	        while($row=mysqli_fetch_array($query)){
          ?>
	    <tr>
            <td><?php echo $row['nama_pelanggan']; ?></td>
            <td><?php echo $row['keluhan']; ?></td>
            <td><?php echo $row['nama_teknisi']; ?></td>
            <td><?php echo $row['perbaikan']; ?></td>
            <td><?php echo $row['tgl_perbaikan']; ?></td>
            <td>
              <a href="#edit_perbaikan<?php echo $row['idperbaikan']; ?>" data-toggle="modal" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</a>  
              <a href="#delete_perbaikan<?php echo $row['idperbaikan']; ?>" data-toggle="modal" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span> Delete</a>
              <?php include ('button_perbaikan.php'); ?>
            </td>
      </tr>
          <?php
        }
      
      ?>
      </tbody>
    </table>
  </div>
</div> 

        <script type="text/javascript">
            $(function() {
                $('#keluhantable').dataTable();
            });
        </script>
<?php include "template/footer.php" ?>
    </body>
</html>