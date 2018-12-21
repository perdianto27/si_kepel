<?php
	include('../config.php');
	$idpelanggan=$_POST['idpelanggan'];
	$keluhan=$_POST['keluhan'];
	$penyebab=$_POST['penyebab'];
	$tindakan=$_POST['tindakan'];
	$tgl_keluhan=$_POST['tgl_keluhan'];
	$tgl_perbaikan=$_POST['tgl_perbaikan'];
	$idteknisi=$_POST['idteknisi'];
	
	mysqli_query($conn, "insert into keluhan (idpelanggan, keluhan, penyebab, tindakan, tgl_keluhan, tgl_perbaikan, idteknisi) 
							values 
							('$idpelanggan', '$keluhan', '$penyebab', '$tindakan', '$tgl_keluhan', '$tgl_perbaikan', '$idteknisi')");
	header('location:keluhan.php');

?>