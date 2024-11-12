<?php
include('db.php');
$id=$_GET['id'];
$query=mysqli_query($database,"select * from `g_timein` where g_id='$id'");
$row=mysqli_fetch_array($query);
//$dateString = $row['guest_timein'];
//$dateObject = new DateTime($dateString);  

?>
<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 10px;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
input[type=text], select, textarea {
  width: 100%;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
input[type=submit] {
  background-color: #081D45;
  color: white;
  margin: 8px;
  padding: 15px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #66b0ff;
}

</style>
<title>Time Out Section</title>
</head>
<body>
    <h2>Time Out Form</h2>
    <a href="index.php#guest">Back</a>
    <form method="POST" action="cal_time.php?id=<?php echo $id; ?>">
    <label>ID:</label><input type="text" value="<?php echo $row['g_id']; ?>" name="g_id" readonly> 
    <label>Name:</label><input type="text" value="<?php echo $row['guest_name']; ?>" name="g_name" readonly> 
    <label>Status:</label><input type="text" value="<?php echo $row['guest_rate']; ?>" name="g_rate" readonly> 
    <label>Rate:</label><input type="text" value="<?php echo $row['guest_status']; ?>" name="customer_type" readonly> 
    <label>Guest Time-in:</label><input type="text" value="<?php echo $row['guest_timein']; ?>" name="start_time" readonly>
    <label>Guest Time Out:</label><input type="datetime-local" id="end_time" name="end_time" required><br>
    <label>Payment Method:</label>
    <select name="p_method" id="p_method" required>
      <option value="Cash">Cash</option>
      <option value="E-Payment">E-Payment</option>
    </select>
    <br><input type="submit" name="submit" style="font-weight: bold;" >
          
    
    </form>

</body>
</html>