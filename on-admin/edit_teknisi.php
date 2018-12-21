<?php
	include('../config.php');
	
	$idteknisi=$_GET['idteknisi'];
	
	$nama_teknisi=$_POST['nama_teknisi'];
	$telpon_teknisi=$_POST['telpon_teknisi'];
	$email_teknisi=$_POST['email_teknisi'];
	
	mysqli_query($conn,"update teknisi set 
							nama_teknisi='$nama_teknisi', telpon_teknisi='$telpon_teknisi', email_teknisi='$email_teknisi' 
							where idteknisi='$idteknisi'");
	header('location:teknisi.php');

?>