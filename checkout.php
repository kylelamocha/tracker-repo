
<?php
session_start ();
require 'db.php';
require 'item.php';

//$guestName= $_POST['g_id'];

// Save order
$sql = "INSERT INTO orders (id, datecreation) 
VALUES (NULL, CURRENT_TIMESTAMP)";
$result=mysqli_query($database,$sql);
$ordersid = mysqli_insert_id($database);

// Save order details for order
$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
for($i=0; $i<count($cart); 
    $i++ ) {
	//$s = $cart [$i]->price * $cart [$i]->quantity;
	mysqli_query($database, 'insert into ordersdetails(prod_id, ordersid, price, quantity)
	values('.$cart[$i]->id.', '.$ordersid.','.$cart [$i]->price * $cart [$i]->quantity.', '.$cart[$i]->quantity.')');
}

echo "<script>alert('Success!'); window.location.href='receipt-order.php';</script>"; 
// Clear all products in cart
unset($_SESSION['cart']);

?>
