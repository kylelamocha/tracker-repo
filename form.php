<?php
        include('db.php');
        $id=$_GET['id'];
        $query=mysqli_query($database,"select * from `time_out` where g_id='$id'");
        $row=mysqli_fetch_array($query); 
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Time Out Details</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  
</head>
<body>
<div class="container" style="margin:15px;">
<a href="index.php#guest">< Back</a>
<h3 style="font-weight: normal; font-size: 18px;">Please check if the details are correct:</h3>
<form  method="POST" action="#">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Guest ID:</label>
      <input type="text" class="form-control" value="<?php echo $row['g_id']; ?>" name="g_id" readonly>
    </div>
    <div class="form-group col-md-6">
      <label>Guest name:</label>
      <input type="text" class="form-control" value="<?php echo $row['guest_name']; ?>" name="guest_name" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Guest Time In:</label>
      <input type="text" class="form-control" value="<?php echo $row['guest_timein']; ?>" name="guest_timein" readonly>
    </div>
    <div class="form-group col-md-6">
      <label>Guest Time Out:</label>
      <input type="text" class="form-control" value="<?php echo $row['guest_timeout']; ?>" name="guest_timeout" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Guest Status:</label>
      <input type="text" class="form-control" value="<?php echo $row['guest_status']; ?>" name="guest_status" readonly>
    </div>
    <div class="form-group col-md-6">
      <label>Guest Rate:</label>
      <input type="text" class="form-control" value="PHP <?php echo $row['guest_rate']; ?>" name="guest_rate" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Total Hours:</label>
      <input type="text" class="form-control" value="<?php echo $row['guest_status']; ?>" name="guest_status" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Additional Fee:</label>
      <input type="text" class="form-control" name="add_fee">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Proceed to Billing</button>
</form>
</div>

  
</body>
</html>