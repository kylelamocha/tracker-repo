<?php
	include('db.php');
	$id=$_GET['id'];
	
	$userName=$_POST['username'];
	$password=$_POST['password'];

	
	mysqli_query($database,"update `users` set username='$userName', password='$password' where id='$id'");
	header('location:admin.php');
?>