<?php
session_start(); 
include "db.php";

$guest_name =  $_REQUEST['guest_name'];
$guest_timein = $_REQUEST['guest_timein'];
//$guest_timein = date('h:i A', strtotime($_REQUEST['guest_timein']));
$guest_status =  $_REQUEST['guest_status'];
$guest_rate =  $_REQUEST['guest_rate'];
//$dateTime = new DateTime();
//$timestamp = date('Y-m-d h:i: A');


// Performing insert query execution
$sql = "INSERT INTO guest_tbl  VALUES (NULL, '$guest_name', 
    '$guest_timein','$guest_status', default, '$guest_rate', CURRENT_TIMESTAMP)";

if(mysqli_query($database, $sql)){
    $alert = "Guest added successfully!";
    echo "<script type='text/javascript'>alert('$alert');</script>";
    header("Location: index.php#guest");
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($database);
}

?>