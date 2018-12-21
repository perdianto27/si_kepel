<?php
	include('../config.php');
	
	$idkeluhan=$_GET['idkeluhan'];
	$idpelanggan=$_POST['idpelanggan'];
	$keluhan=$_POST['keluhan'];
	$penyebab=$_POST['penyebab'];
	$tindakan=$_POST['tindakan'];
	$tgl_keluhan=$_POST['tgl_keluhan'];
	$tgl_perbaikan=$_POST['tgl_perbaikan'];
	$idteknisi=$_POST['idteknisi'];
	
	mysqli_query($conn,"update keluhan set 
							idpelanggan ='$idpelanggan', keluhan='$keluhan', penyebab='$penyebab', tindakan='$tindakan', tgl_keluhan='$tgl_keluhan', tgl_perbaikan='$tgl_perbaikan', idteknisi='$idteknisi' 
							where idkeluhan='$idkeluhan'");
	header('location:keluhan.php');

?>