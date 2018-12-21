<!-- Delete -->
    <div class="modal fade" id="delete_teknisi<?php echo $row['idteknisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"select * from teknisi where idteknisi='".$row['idteknisi']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Nama: <strong><?php echo $drow['nama_teknisi']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete_teknisi.php?idteknisi=<?php echo $row['idteknisi']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
    <div class="modal fade" id="edit_teknisi<?php echo $row['idteknisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit_teknisi=mysqli_query($conn,"select * from teknisi where idteknisi='".$row['idteknisi']."'");
					$erow=mysqli_fetch_array($edit_teknisi);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit_teknisi.php?idteknisi=<?php echo $erow['idteknisi']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Nama Teknisi:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="nama_teknisi" class="form-control" value="<?php echo $erow['nama_teknisi']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Telepon Teknisi:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="telpon_teknisi" class="form-control" value="<?php echo $erow['telpon_teknisi']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Email Teknisi:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="email_teknisi" class="form-control" value="<?php echo $erow['email_teknisi']; ?>">
						</div>
					</div>
					</div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->
