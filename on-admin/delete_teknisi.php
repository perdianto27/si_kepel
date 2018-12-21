<?php
	include('../config.php');
	$idteknisi=$_GET['idteknisi'];
	mysqli_query($conn,"delete from teknisi where idteknisi='$idteknisi'");
	header('location:teknisi.php');

?>