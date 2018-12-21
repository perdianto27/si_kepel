<?php
	include('../config.php');
	
	$idpelanggan=$_GET['idpelanggan'];
	
	$nama_pelanggan=$_POST['nama_pelanggan'];
	$alamat_pelanggan=$_POST['alamat_pelanggan'];
	$telepon_pelanggan=$_POST['telepon_pelanggan'];
	$email_pelanggan=$_POST['email_pelanggan'];
	
	mysqli_query($conn,"update pelanggan set 
							nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', telepon_pelanggan='$telepon_pelanggan', email_pelanggan='$email_pelanggan' 
							where idpelanggan='$idpelanggan'");
	header('location:pelanggan.php');
?>