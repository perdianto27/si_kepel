<?php
	include('../config.php');
	$idperbaikan=$_GET['idperbaikan'];
	$idpelanggan=$_POST['idpelanggan'];
	$idkeluhan=$_POST['idkeluhan'];
	$idteknisi=$_POST['idteknisi'];
	$perbaikan=$_POST['perbaikan'];
	$tgl_perbaikan=$_POST['tgl_perbaikan'];
	
	mysqli_query($conn, "insert into perbaikan (idpelanggan, idkeluhan, idteknisi, perbaikan, tgl_perbaikan) 
							values 
							('$idpelanggan', '$idkeluhan', '$idteknisi', '$perbaikan', '$tgl_perbaikan')");
	header('location:perbaikan.php');

?>