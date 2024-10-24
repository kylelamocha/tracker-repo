<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Section</title>
</head>
<body>
<?php
	require 'db.php';
	$result = mysqli_query($database, 'select * from products');
?>
<a href="index.php#guest">Back</a>
<table cellpadding="2" cellspacing="2" border="0">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Price</th>
		<th>Buy</th>
	</tr>
	<?php while($product = mysqli_fetch_object($result)) { ?>
		<tr>
			<td><?php echo $product->prod_ID; ?></td>
			<td><?php echo $product->prod_name; ?></td>
			<td><?php echo $product->prod_price; ?></td>
			<td><a href="cart.php?id=<?php echo $product->prod_ID; ?>">Order Now</a></td>
		</tr>
	<?php } ?>
</table>
</table>
  
</body>
</html>