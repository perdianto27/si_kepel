<?php
	include('../config.php');
	
	$idperbaikan=$_GET['idperbaikan'];
	$idpelanggan=$_POST['idpelanggan'];
	$idteknisi=$_POST['idteknisi'];
	$idkeluhan=$_POST['idkeluhan'];
	$perbaikan=$_POST['perbaikan'];
	$tgl_perbaikan=$_POST['tgl_perbaikan'];

	mysqli_query($conn,"update perbaikan set 
							idpelanggan ='$idpelanggan', idteknisi='$idteknisi', idkeluhan='$idkeluhan', perbaikan='$perbaikan', tgl_perbaikan='$tgl_perbaikan' 
							where idperbaikan='$idperbaikan'");
	header('location:perbaikan.php');

?>