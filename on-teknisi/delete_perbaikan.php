<?php
	include('../config.php');
	$idperbaikan=$_GET['idperbaikan'];
	mysqli_query($conn,"delete from perbaikan where idperbaikan='$idperbaikan'");
	header('location:perbaikan.php');

?>