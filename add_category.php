<?php
session_start(); 
include "db.php";

$category =  $_REQUEST['name'];

// Performing insert query execution
$sql = "INSERT INTO category_list (ID, name) VALUES (NULL, '$category')";

if(mysqli_query($database, $sql)){
    $alert = "Category added successfully!";
    echo "<script type='text/javascript'>alert('$alert');</script>";
    header("Location: categories.php");
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($database);
}

?>