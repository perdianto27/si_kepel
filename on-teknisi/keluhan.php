<?php include "../config.php"; ?>
<?php include "template/header.php" ?>
<?php include "template/sidebar.php" ?>
<?php include('tambah_modalkeluhan.php'); ?>
    <body>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Data Keluhan</small>
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
              <h3 class="box-title">Data Keluhan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">     
  <span class="pull-right"><a href="ekspor_pdf_keluhan.php" target="blank" class="btn btn-primary"><span class="fa fa-download"></span>&nbsp; Ekspor Keluhan</a></span>
  <div style="height:50px;"></div>
  <div class="box-body table-responsive">
        <table id="keluhantable" class="table table-bordered table-striped">
      <thead>
        <th>Nama Pelanggan</th>
        <th>Keluhan</th>
        <th>Penyebab</th>
        <th>Tindakan</th>
        <th>Tgl Keluhan</th>
         <th>Nama Teknisi</th>
      </thead>
      <tbody>
      <?php
        $query=mysqli_query($conn,"select * from keluhan INNER JOIN pelanggan ON keluhan.idpelanggan = pelanggan.idpelanggan
		INNER JOIN teknisi ON keluhan.idteknisi = teknisi.idteknisi ");
	        while($row=mysqli_fetch_array($query)){
          ?>
	    <tr>
            <td><?php echo $row['nama_pelanggan']; ?></td>
            <td><?php echo $row['keluhan']; ?></td>
            <td><?php echo $row['penyebab']; ?></td>
            <td><?php echo $row['tindakan']; ?></td>
            <td><?php echo $row['tgl_keluhan']; ?></td>
            <td><?php echo $row['nama_teknisi']; ?></td>
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