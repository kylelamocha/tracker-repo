<?php
        include('db.php');
        $id=$_GET['id'];
        $query=mysqli_query($database,"select * from `g_timeout` where g_id='$id' ");
        $row=mysqli_fetch_array($query); 
        $dateString = $row['start_time'];
        $datestring = $row['end_time'];
        $dateObject = new DateTime($dateString);
        $dateObj = new DateTime($datestring);
     
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
      <label><b>Guest ID:</b></label>
      <input type="text" class="form-control" value="<?php echo $row['g_id']; ?>" name="g_id" readonly>
    </div>
    <div class="form-group col-md-6">
      <label><b>Guest Status:</b></label>
      <input type="text" class="form-control" value="<?php echo $row['customer_type']; ?>" name="guest_status" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label><b>Guest Time In:</b></label>
      <input type="text" class="form-control" value="<?php echo $dateObject->format('d/m/y h:i A'); ?>" name="g_start" readonly>
    </div>
    <div class="form-group col-md-6">
      <label><b>Guest Time Out:</b></label>
      <input type="text" class="form-control" value="<?php echo $dateObj->format('d/m/y h:i A'); ?>" name="g_end" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label><b>Guest Rate:</b></label>
      <input type="text" class="form-control" value="PHP <?php echo $row['g_rate']; ?>" name="g_rate" readonly>
    </div>
    <div class="form-group col-md-6">
      <label><b>Total Hours:</b></label>
      <input type="text" class="form-control" value="<?php echo $row['total_hrs']; ?>" name="total_hrs" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label><b>Total:</b></label>
      <input type="text" class="form-control" value="PHP <?php echo $row['total_price']; ?>" name="total_price" readonly>
    </div>
    <div class="form-group col-md-6">
      <label><b>Payment Method:</b></label>
      <input type="text" class="form-control" value="<?php echo $row['p_method']; ?>" name="p_method" readonly>
    </div>
  </div>
  <a href="receipt.php?id=<?php echo $row['g_id']?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Proceed to Receipt</a>
  <!--<button type="submit" class="btn btn-primary" >Proceed to Billing</button>-->
</form>
</div>

  
</body>
</html>