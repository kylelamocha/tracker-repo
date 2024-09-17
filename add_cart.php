<?php 
    include('db.php');
    $id=$_GET['id'];
    
    $query=mysqli_query($database, "SELECT * FROM `products` where prod_ID='$id'") or die(mysqli_error($database));
    $fetch=mysqli_fetch_array($query);
    $prodName=$fetch['prod_name'];
    $prodPrice=$fetch['prod_price'];
                   
    mysqli_query($database, "INSERT INTO `cart` VALUES('', '$id', '$prodName', '$prodPrice')") or die(mysqli_error($database));

	header('location:index.php');

?>