<?php
	$id=$_GET['id'];
	include('db.php');
	mysqli_query($database,"delete from `guest_tbl` where g_id='$id'");
	header('location:index.php#guest');
?>