<?php
session_start(); 
include "db.php";


$filename = $_FILES["prod_img"]["name"];
$tempname = $_FILES["prod_img"]["tmp_name"];
$folder = "./image/" . $filename; //img
$prod_name = $_REQUEST['prod_name'];
$prod_price =  $_REQUEST['prod_price'];
$prod_stock =  $_REQUEST['prod_stock'];
$prodCategory= $_POST['category_id'];


// Performing insert query execution
$sql = "INSERT INTO products (prod_ID, prod_img, prod_name, prod_price, prod_stock, category_id) VALUES (NULL, '$filename','$prod_name', '$prod_price','$prod_stock','$prodCategory')";
$result=mysqli_query($database,$sql);

if (move_uploaded_file($tempname, $folder)) {
    $alert = "<h3>&nbsp; Product Image uploaded successfully!</h3>";
    echo "<script type='text/javascript'>alert('$alert');</script>";
    header("Location: admin.php#page2");
}else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($database);
}