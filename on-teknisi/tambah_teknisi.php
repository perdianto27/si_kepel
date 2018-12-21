<?php
	include('../config.php');
	$idteknisi=$_POST['idteknisi'];
	$nama_teknisi=$_POST['nama_teknisi'];
	$telpon_teknisi=$_POST['telpon_teknisi'];
	$email_teknisi=$_POST['email_teknisi'];
	
	mysqli_query($conn, "insert into teknisi (idteknisi, nama_teknisi, telpon_teknisi, email_teknisi) 
							values 
							('idteknisi', '$nama_teknisi', '$telpon_teknisi', '$email_teknisi')");
	header('location:teknisi.php');

?>