<?php
	include('../config.php');
	$idadmin=$_GET['idadmin'];
	mysqli_query($conn,"delete from admin where idadmin='$idadmin'");
	header('location:admin.php');

?>