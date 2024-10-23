<?php
    session_start(); 
    include "db.php";

    $id=$_GET['id'];

    $g_id = $_REQUEST['g_id'];
    $g_name = $_REQUEST['guest_name'];
    $time1 = $_REQUEST['guest_timein'];
    $time2 = $_REQUEST['guest_timeout'];
    $g_rate = $_REQUEST['guest_rate'];
    $g_stat = $_REQUEST['guest_status'];
    $g_desc = $_REQUEST['g_desc'];

    $seconds1 = strtotime($time1);
    $seconds2 = strtotime($time2);

    $secondsDiff = $seconds2 - $seconds1;

    $hoursDiff = $secondsDiff / 3600;

    $sql = "INSERT INTO time_out (Pid, g_id, guest_name, guest_timein, guest_timeout, guest_rate, guest_status, g_desc, total_hrs, date_created) VALUES (NULL, '$g_id','$g_name', '$time1','$time2','$g_rate', '$g_stat','$g_desc', '$hoursDiff' ,CURRENT_TIMESTAMP)";

    if(mysqli_query($database, $sql)){
        $alert = "Guest timed out successfully!";
        echo "<script type='text/javascript'>alert('$alert');</script>";
        header("Location:form.php?id=$id");
    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($database);
    }
    
?>
