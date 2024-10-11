<?php
	include('db.php');
	$id=$_GET['id'];
	
	$guestName=$_POST['guest_name'];
	$guestStatus=$_POST['guest_status'];
    $guestRate=$_POST['guest_rate'];
	
	
	mysqli_query($database,"update `guest_tbl` set guest_name='$guestName', guest_status='$guestStatus', guest_rate=' $guestRate' where g_id='$id'");
	header('location:index.php#guest');
?>