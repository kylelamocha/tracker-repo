<?php
include('db.php');
$query=mysqli_query($database,"select * from `ordersdetails`");
$row=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order-Receipt</title>
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
            <p style="font-size: 14px;"><strong>Order No: <?php echo $row['ordersid']; ?></strong> </p>
            <!--<p style="font-size: 14px;"><strong>Total: PHP <?php echo $row['price']; ?></strong></p>-->
        </div>

        <div class="receipt-total">
            <p>Total Amount: PHP <?php echo $row['price']; ?></p>
        </div>


        <div class="receipt-footer">
            <p>Thank you for the purchase!</p>
			<!--<p>REMINDER: Give guest the order number.</p>-->
			<!--<p>Click <a href="order_guest.php">here</a> to buy again.</p>-->
			<p>Click <a href="index.php#guest">here</a> to exit.</p>
            <!--<a href="index.php#guest">Back</a><br><br>-->
            <button onClick="window.print()">Print this receipt</button>
			<br>
			<br>
			<br>
			<br>
            <!--<input type="button" onclick="printDiv('printableArea')"/>-->
    </div>
		<script src="./js/print.js"></script>
    </div>	


</body>
</html>