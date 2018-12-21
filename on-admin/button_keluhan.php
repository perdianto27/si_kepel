<!-- Delete -->
    <div class="modal fade" id="delete_keluhan<?php echo $row['idkeluhan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				
				<div class="container-fluid">
					<h5><center>Keluhan: <strong><?php echo $row['keluhan']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete_keluhan.php?idkeluhan=<?php echo $row['idkeluhan']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
    <div class="modal fade" id="edit_keluhan<?php echo $row['idkeluhan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="edit_keluhan.php?idkeluhan=<?php echo $row['idkeluhan']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Pelanggan:</label>
						</div>
						<div class="col-lg-10">
						<?php include "../config.php"; ?>
						<!--ambil data pelanggan-->
						<?php
						$query_pelanggan = "SELECT idpelanggan, nama_pelanggan FROM pelanggan ORDER BY nama_pelanggan";
						$sql = mysqli_query($conn, $query_pelanggan);
						$array = array();
						while ($row_pelanggan = mysqli_fetch_assoc($sql)) {
							$array [ $row_pelanggan['idpelanggan'] ] = $row_pelanggan['nama_pelanggan'];
						}
						 
						?>
							<select id="idpelanggan" name="idpelanggan" class="form-control">
								<option value="">-Pilih Pelanggan-</option>
						<?php
							foreach ($array as $idpelanggan=>$nama_pelanggan) {

								$selected = '';
								if ($idpelanggan == $row['idpelanggan']) {
									$selected = 'selected';
								}								
								
								echo "<option " . $selected . " value='$idpelanggan'>$nama_pelanggan</option>";
							}
						?>
							</select>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Keluhan:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="keluhan" class="form-control" value="<?php echo $row['keluhan']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Penyebab:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="penyebab" class="form-control" value="<?php echo $row['penyebab']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Tindakan:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="tindakan" class="form-control" value="<?php echo $row['tindakan']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Tgl Keluhan:</label>
						</div>
						<div class="col-lg-10">
							<input type="date" name="tgl_keluhan" class="form-control" value="<?php echo $row['tgl_keluhan']; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Tgl Perbaikan:</label>
						</div>
						<div class="col-lg-10">
							<input type="date" name="tgl_perbaikan" class="form-control" value="<?php echo $row['tgl_perbaikan']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Teknisi:</label>
						</div>
						<div class="col-lg-10">
						<?php
						$query_teknisi = "SELECT idteknisi, nama_teknisi FROM teknisi ORDER BY nama_teknisi";
						$sql = mysqli_query($conn, $query_teknisi);
						$array = array();
						while ($row_teknisi = mysqli_fetch_assoc($sql)) {
							$array [ $row_teknisi['idteknisi'] ] = $row_teknisi['nama_teknisi'];
						}
						 
						?>
							<select id="idteknisi" name="idteknisi" class="form-control">
								<option value="">-Pilih Teknisi-</option>
						<?php
							foreach ($array as $idteknisi=>$nama_teknisi) {

								$selected = '';
								if ($idteknisi == $row['idteknisi']) {
									$selected = 'selected';
								}
								
								
								echo "<option " . $selected . " value='$idteknisi'>$nama_teknisi</option>";
							}
						?>
							</select>
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
