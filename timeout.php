<?php
include('db.php');
$id=$_GET['id'];
$query=mysqli_query($database,"select * from `guest_tbl` where g_id='$id'");
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
    <form method="POST" action="calculate.php?id=<?php echo $id; ?>">
    <label>Guest ID:</label><input type="text" value="<?php echo $row['g_id']; ?>" name="g_id" readonly>
    <label>Guest name:</label><input type="text" value="<?php echo $row['guest_name']; ?>" name="guest_name" readonly><br>
    <label>Guest Time-in:</label><input type="text" value="<?php echo $row['guest_timein']; ?>" name="guest_timein" readonly>
    <label>Guest Time Out:</label><input type="datetime-local" id="guest_timeout" name="guest_timeout" required><br>
    <label>Guest Status:</label><input type="text" value="<?php echo $row['guest_status']; ?>" name="guest_status" readonly> 
    <label>Guest Rate:</label><input type="text" value="<?php echo $row['guest_rate']; ?>" name="guest_rate" readonly>

    <label>Select Option:</label>
    <select name="g_desc" required><br><br>
       <option value="Time In">Time In</option> 
       <option value="Timed Out">Timed Out</option>           
	</select>
    <input type="submit" name="submit" style="font-weight: bold;" >
          
    <a href="index.php#guest">Back</a>
    </form>



</body>
</html>