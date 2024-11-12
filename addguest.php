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
$sql = "INSERT INTO g_timein  VALUES (NULL, '$guest_name', 
    '$guest_timein','$guest_status', '$guest_rate', default, CURRENT_TIMESTAMP)";

if(mysqli_query($database, $sql)){
   // $alert = "Guest added successfully!";
    //echo "<script type='text/javascript'>alert('$alert');</script>";
    //header("Location: index.php#guest");
    echo "<script>alert('Guest added successfully!'); window.location.href='index.php#guest';</script>";

} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($database);
}

?>