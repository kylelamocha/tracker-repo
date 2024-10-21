<?php
        include('db.php');
        $id=$_GET['id'];
        $query=mysqli_query($database,"select * from `bill` where g_id='$id'");
        $row=mysqli_fetch_array($query);
        $dateString = $row['guest_timein'];
        $date = $row['guest_timeout'];
        $dateObject = new DateTime($dateString);
        $dateObj = new DateTime($date)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Receipt-AORBTS Workhub</title>
    
<style>
	body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f8f8f8;
}

.receipt-container {
  width: 80mm;
  margin: 0 auto;
  background-color: #ffffff;
  padding: 10px;
  box-sizing: border-box;
  border: 1px solid #dddddd;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}

.receipt-header {
  text-align: center;
  margin-bottom: 10px;
}

.receipt-header h2 {
  margin-bottom: 0;
  font-size: 18px;
}

.receipt-details {
  margin-bottom: 10px;
}

.receipt-details p {
  margin: 5px 0;
  font-size: 12px;
}

.receipt-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 12px;
}

.receipt-table th, .receipt-table td {
  padding: 5px 0;
  text-align: left;
  border-bottom: 1px solid #dddddd;
}

.receipt-total {
  margin-top: 10px;
  text-align: right;
}

.receipt-total p {
  margin: 0;
  font-size: 14px;
  font-weight: bold;
}

.receipt-footer {
  text-align: center;
  margin-top: 20px;
  font-size: 10px;
  color: #999999;
}
</style>
</head>
<body>
    <div class="receipt-container" id="printableArea">
        <div class="receipt-header">
			  <i class="fa-solid fa-chart-simple"></i>

            <h2>AORBTS Workhub</h2>
            <p style="font-size: 12px;">Date and Time:
            <?php
            //date_default_timezone_set('Asia/Kolkata');
            
            $dateTime = new DateTime("now", new DateTimeZone('Asia/Manila'));
            echo $dateTime->format("Y-m-d h:i:A");

            ?>
			      </p>
            
        </div>
    
      
        <div class="receipt-details" id="print">
            <p style="font-size: 14px;"><strong>Guest Name:</strong> <?php echo $row['guest_name']; ?></p>
            <p style="font-size: 14px;"><strong>Check in:</strong> <?php echo $dateObject->format('d/m/y h:i A'); ?></p>
            <p style="font-size: 14px;"><strong>Check out:</strong> <?php echo $dateObj->format('d/m/y h:i A'); ?></p>
            <p style="font-size: 14px;"><strong>Total Hours:</strong> <?php echo $row['guest_hrs']; ?></p>
        </div>

        <!--<table class="receipt-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
					<th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Item 1</td>
                    <td>2</td>
                    <td>$10.00</td>
					<td>$20.00</td>
                </tr>
                <tr>
                    <td>Item 2</td>
                    <td>1</td>
                    <td>$15.00</td>
					<td>$15.00</td>
                </tr>
                <tr>
                    <td>Item 3</td>
                    <td>3</td>
                    <td>$5.00</td>
					<td>$15.00</td>
                </tr>
            </tbody>
        </table>-->

        <div class="receipt-total">
            <p>Total Amount: PHP<?php echo $row['g_total']; ?></p>
        </div>

		    <!--<div class="receipt-total">
            <p>Change: $50.00</p>
        </div>-->

        <div class="receipt-footer">
            <p>Thank you for your stay!</p>
            <a href="index.php#guest">Back</a><br><br>   
            <button onClick="window.print()">Print this receipt</button>
            <!--<input type="button" onclick="printDiv('printableArea')"/>-->
    </div>
		<script src="./js/print.js"></script>
    </div>
</body>
</html>