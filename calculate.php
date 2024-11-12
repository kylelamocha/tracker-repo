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

    //$add_fee = 0;
   
    if($g_stat == 'Regular' && $hoursDiff > 3){  
        $add_fee = 25 * $hoursDiff;
    }elseif ($g_stat == 'Student' && $hoursDiff > 3){
        $add_fee = 20 * $hoursDiff;
    }else{
        $sql = "INSERT INTO time_out (Pid, g_id, guest_name, guest_timein, guest_timeout, g_desc, guest_status, guest_rate, total_hrs, add_fee, date_created) 
        VALUES (NULL, '$g_id','$g_name', '$time1','$time2','$g_desc', '$g_stat', '$g_rate', '$hoursDiff', '$add_fee', CURRENT_TIMESTAMP)";
        
        $result = mysqli_query($database, $sql);
        if($result){
        echo "<script>alert('Guest timed out successfully!'); 
        window.location.href='form.php?id=$id';</script>";
        }else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($database);
        }

    }
   
    
?>
