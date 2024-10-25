<?php
	$id=$_GET['id'];
	include('db.php');
	mysqli_query($database,"delete from `guest_tbl` where g_id='$id'");
	echo "<script>alert('Guest deleted successfully!'); window.location.href='index.php#guest';</script>";
	//header('location:index.php#guest');
?>