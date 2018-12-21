<?php
	include('../config.php');
	$idkeluhan=$_GET['idkeluhan'];
	mysqli_query($conn,"delete from keluhan where idkeluhan='$idkeluhan'");
	header('location:keluhan.php');

?>