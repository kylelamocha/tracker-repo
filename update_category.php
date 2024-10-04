<?php
	include('db.php');
	$id=$_GET['id'];
	
	$ID=$_POST['ID'];
	$category_name=$_POST['name'];

	
	$result = mysqli_query($database,"update `category_list` set name='$category_name', ID='$ID' where ID='$id'");
    $num_rows = mysqli_num_rows($result);
    // will add for duplicate
    if ($num_rows ) {
        trigger_error('It exists.', E_USER_WARNING);
    }

	header('location:pos_inventory.php');
?>