<?php
	include('db.php');
	$id=$_GET['id'];
	
	//$ID=$_POST['ID'];
	$name=$_POST['name'];

	
	mysqli_query($database,"update `category_list` set name='$name' where id='$id'");
	header('location:categories.php');
?>