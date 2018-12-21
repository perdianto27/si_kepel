<?php
	include('../config.php');
	
	$idadmin=$_GET['idadmin'];
	$nama_admin=$_POST['nama_admin'];
	$kata_sandi=md5($_POST['kata_sandi']);
	
	mysqli_query($conn,"update admin set 
							nama_admin='$nama_admin', kata_sandi='$kata_sandi' 
							where idadmin='$idadmin'");
	header('location:admin.php');

?>