<?php
	include('db.php');
	$id=$_GET['id'];
	
	$prodName=$_POST['prod_name'];
	$prodPrice=$_POST['prod_price'];
    $prodStock=$_POST['prod_stock'];
	
	mysqli_query($database,"update `products` set prod_name='$prodName', prod_price='$prodPrice', prod_stock='$prodStock' where prod_ID='$id'");
	header('location:pos_inventory.php');
?>