<?php
    session_start(); 
    include "db.php";
    
    $id=$_GET['id'];
    //$query=mysqli_query($database,"select * from `bill` where g_id='$id'");
    $g_id = $_REQUEST['g_id'];
    $g_name = $_REQUEST['guest_name'];
    $time1 = $_REQUEST['guest_timein'];
    $time2 = $_REQUEST['guest_timeout'];
    $g_rate = $_REQUEST['guest_rate'];
    $g_stat = $_REQUEST['guest_status'];
   
    $seconds1 = strtotime($time1);
    $seconds2 = strtotime($time2);

    $secondsDiff = $seconds2 - $seconds1;

    $hoursDiff = $secondsDiff / 3600;

    //$g_fee = $_REQUEST['add_fee'];
    $total = $g_rate+ $g_fee['add_fee'];

   // Performing insert query execution
    $sql = "INSERT INTO bill (bill_id, g_id, guest_name, guest_timein, guest_timeout, guest_rate, guest_status, guest_hrs, add_fee, g_total) VALUES (NULL, '$g_id','$g_name', '$time1','$time2','$g_rate', '$g_stat', '$hoursDiff', '$g_fee', '$total')";

    if(mysqli_query($database, $sql)){
        $alert = "Bill added successfully!";
        echo "<script type='text/javascript'>alert('$alert');</script>";
        header("Location:receipt.php?id=$id");
    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($database);
    }

?>
