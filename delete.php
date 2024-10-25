<?php
	$id=$_GET['id'];
	include('db.php');
	mysqli_query($database,"delete from `products` where prod_ID='$id'");
	echo "<script>alert('Product is deleted!'); window.location.href='menu.php';</script>";
	//header('location:menu.php');
?>