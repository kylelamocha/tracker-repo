<?php
	$id=$_GET['db.php'];
	include('db.php');
	mysqli_query($database,"delete from `products` where prod_ID='$id'");
	header('location:admin.php');
?>