<?php
	include('db.php');
	$id=$_GET['id'];
	
	$prodName=$_POST['prod_name'];
	$prodPrice=$_POST['prod_price'];
    $prodCode=$_POST['code'];
	$prodCategory=$_POST['category_id'];
	
	mysqli_query($database,"update `products` set prod_name='$prodName', prod_price='$prodPrice', code='$prodCode', category_id='$prodCategory' where prod_ID='$id'");
	header('location:menu.php');
?>