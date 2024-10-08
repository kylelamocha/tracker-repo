<?php
	$id=$_GET['id'];
	include('db.php');
	mysqli_query($database,"delete from `cart` where cart_ID='$id'");
	header('location:index.php#order');
?>