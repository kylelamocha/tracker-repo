<?php
session_start(); 
include "db.php";

$cat_ID =  $_REQUEST['ID'];
$category_name= $_POST['name'];

$sql = "INSERT INTO category_list (ID, name) VALUES ('$cat_ID', '$category_name')";
header('location:pos_inventory.php');

if(mysqli_query($database, $sql)){
    $alert = "Category added successfully!";
    echo "<script type='text/javascript'>alert('$alert');</script>";
    header("Location: pos_inventory.php");
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($database);
}



?>