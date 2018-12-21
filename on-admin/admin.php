<?php include "../config.php"; ?>
<?php include "template/header.php" ?>
<?php include "template/sidebar.php" ?>
<?php include('tambah_modaladmin.php'); ?>
    <body>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Data Admin</small>
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
              <h3 class="box-title">Data Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">			
	<span class="pull-left"><a href="#tambah_admin" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah Admin</a></span>
	<div style="height:50px;"></div>
	<div class="box-body table-responsive">
        <table id="keluhantable" class="table table-bordered table-striped">
			<thead>
				<th>Nama Admin</th>
				<!--<th>Kata Sandi</th>-->
				<th>Action</th>
			</thead>
			<tbody>
			<?php
				$query=mysqli_query($conn,"select * from `admin`");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['nama_admin']; ?></td>
						<!--<td><?php echo $row['kata_sandi']; ?></td>-->
						<td>
							<a href="#edit_admin<?php echo $row['idadmin']; ?>" data-toggle="modal" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</a>  
							<a href="#delete_admin<?php echo $row['idadmin']; ?>" data-toggle="modal" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							<?php include ('button_admin.php'); ?>
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