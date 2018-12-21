<?php
	include('../config.php');
	$idpelanggan=$_GET['idpelanggan'];
	mysqli_query($conn,"delete from pelanggan where idpelanggan='$idpelanggan'");
	header('location:pelanggan.php');

?>