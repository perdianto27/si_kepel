<?php
	include('../config.php');

	$idadmin=$_POST['idadmin'];
	$nama_admin=$_POST['nama_admin'];
	$kata_sandi=md5($_POST['kata_sandi']);
	$level_user=$_POST['level_user'];
	
	
	mysqli_query($conn, "insert into admin (idadmin, nama_admin, kata_sandi,level_user) 
							values 
							('$idadmin','$nama_admin', '$kata_sandi', '$level_user')");
	header('location:admin.php');

?>