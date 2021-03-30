<!-- Add New -->
    <div class="modal fade" id="tambah_keluhan" tabindex="-1" role="dialog" aria-labelleconny="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Tambah Keluhan</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="tambah_keluhan.php">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Nama Pelanggan:</label>
						</div>
						<div class="col-lg-10">
						<?php include "../config.php"; ?>
						<!--ambil data propinsi-->
						<?php
						$query = "SELECT idpelanggan, nama_pelanggan FROM pelanggan ORDER BY nama_pelanggan";
						$sql = mysqli_query($conn, $query);
						$array = array();
						while ($row = mysqli_fetch_assoc($sql)) {
							$array [ $row['idpelanggan'] ] = $row['nama_pelanggan'];
						}
						 
						?>
							<select id="idpelanggan" name="idpelanggan" class="form-control">
							<option value="">-Pilih Pelanggan-</option>
							<?php
							foreach ($array as $idpelanggan=>$nama_pelanggan) {
								echo "<option value='$idpelanggan'>$nama_pelanggan</option>";
							}
						?>
						</select>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Keluhan:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="keluhan">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Penyebab:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="penyebab">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Tindakan:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="tindakan">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Tgl Keluhan:</label>
						</div>
						<div class="col-lg-10">
							<input type="date" class="form-control" name="tgl_keluhan" >
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Tgl Perbaikan:</label>
						</div>
						<div class="col-lg-10">
							<input type="date" class="form-control" name="tgl_perbaikan" >
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Teknisi:</label>
						</div>
						<div class="col-lg-10">
						<?php include "../config.php"; ?>
						<!--ambil data propinsi-->
						<?php
						$query = "SELECT idteknisi, nama_teknisi FROM teknisi ORDER BY nama_teknisi";
						$sql = mysqli_query($conn, $query);
						$array = array();
						while ($row = mysqli_fetch_assoc($sql)) {
							$array [ $row['idteknisi'] ] = $row['nama_teknisi'];
						}
						 
						?>
							<select id="idteknisi" name="idteknisi" class="form-control">
							<option value="">-Pilih Teknisi-</option>
							<?php
							foreach ($array as $idteknisi=>$nama_teknisi) {
								echo "<option value='$idteknisi'>$nama_teknisi</option>";
							}
						?>
						</select>
						</div>
					</div>
					  </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>
