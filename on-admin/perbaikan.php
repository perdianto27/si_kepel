<?php include "../config.php"; ?>
<?php include "template/header.php" ?>
<?php include "template/sidebar.php" ?>
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
    <span class="pull-right"><a href="ekspor_pdf_perbaikan.php" target="blank" class="btn btn-primary"><span class="fa fa-download"></span>&nbsp; Ekspor Perbaikan</a></span>
  <div style="height:50px;"></div>
  <div class="box-body table-responsive">
        <table id="keluhantable" class="table table-bordered table-striped">
      <thead>
        <th>ID Perbaikan</th>
        <th>Pelanggan</th>
        <th>Keluhan</th>
        <th>Teknisi</th>
        <th>Perbaikan</th>
        <th>Tgl Perbaikan</th>
      </thead>
      <tbody>
      <?php
        $query=mysqli_query($conn,"select * from perbaikan INNER JOIN pelanggan ON perbaikan.idpelanggan = pelanggan.idpelanggan INNER JOIN keluhan ON perbaikan.idkeluhan = keluhan.idkeluhan INNER JOIN teknisi ON perbaikan.idteknisi = teknisi.idteknisi ");
	        while($row=mysqli_fetch_array($query)){
          ?>
	    <tr>
            <td><?php echo $row['idperbaikan']; ?></td>
            <td><?php echo $row['nama_pelanggan']; ?></td>
            <td><?php echo $row['keluhan']; ?></td>
            <td><?php echo $row['nama_teknisi']; ?></td>
            <td><?php echo $row['perbaikan']; ?></td>
            <td><?php echo $row['tgl_perbaikan']; ?></td>
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