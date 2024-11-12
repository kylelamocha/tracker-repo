<?php
include "db.php";
$id=$_GET['id'];
$g_id = $_REQUEST['g_id'];
$g_rate = $_REQUEST['g_rate'];
$g_name = $_REQUEST['g_name'];
$p_method = $_POST['p_method'];
$start_time = $_REQUEST['start_time']; // Start time from form
$end_time = $_POST['end_time'];     // End time from form
$customer_type = $_REQUEST['customer_type']; // Customer type (student or regular)

// Function to calculate the total price
function calculate_price($start_time, $end_time, $customer_type) {
    // Base price and base hours
    $base_price = 100;
    $base_hours = 3;
    
    // Additional charges based on customer type
    $extra_rate_student = 20;  // charge per additional hour for students
    $extra_rate_regular = 25;  // charge per additional hour for regular customers
    
    // Calculate the difference between the two dates in hours
    $start_timestamp = strtotime($start_time);
    $end_timestamp = strtotime($end_time);
    $time_difference_in_seconds = $end_timestamp - $start_timestamp;
    $time_difference_in_hours = $time_difference_in_seconds / 3600; // Convert seconds to hours
    
    // If the time difference is less than or equal to the base hours, no extra charge
    if ($time_difference_in_hours <= $base_hours) {
        return $base_price;
    }
    
    // Calculate the extra charge based on the customer type
    $extra_hours = $time_difference_in_hours - $base_hours;
    
    // Determine the additional rate based on customer type
    if ($customer_type == 'Student') {
        $extra_charge = $extra_hours * $extra_rate_student;
    } else {
        $extra_charge = $extra_hours * $extra_rate_regular;
    }
    
    // Calculate the total price
    $total_price = $base_price + $extra_charge;
    
    // Return the total price
    return $total_price;
}

// Calculate the price
$total_price = calculate_price($start_time, $end_time, $customer_type);

$seconds1 = strtotime($start_time);
$seconds2 = strtotime($end_time);

$secondsDiff = $seconds2 - $seconds1;

$hoursDiff = $secondsDiff / 3600; //total hrs


// Prepare the SQL statement to insert the data into the database
$sql = "INSERT INTO g_timeout (g_id, g_name, start_time, end_time, customer_type, g_rate, total_hrs, total_price, p_method, p_status, date_created)
VALUES ('$g_id', '$g_name', '$start_time', '$end_time', '$customer_type', '$g_rate', '$hoursDiff','$total_price', '$p_method', default, CURRENT_TIMESTAMP)";

// Execute the query and check if it was successful
if ($database->query($sql) === TRUE) {
    mysqli_query($database,"DELETE from g_timein where g_id='$id'");
    echo "<script>alert('Guest timed out successfully!'); 
        window.location.href='form.php?id=$id';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $database->error;
}

?>