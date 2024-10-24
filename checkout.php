<?php
session_start ();
require 'db.php';
require 'item.php';

// Save new order
mysqli_query($database, 'insert into orders(name, datecreation, status)
values("New Order", "'.date('Y-m-d').'", 0)');
$ordersid = mysqli_insert_id($database);

// Save order details for new order
$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
for($i=0; $i<count($cart); $i++) {
	mysqli_query($database, 'insert into ordersdetails(prod_id, ordersid, price, quantity)
values('.$cart[$i]->id.', '.$ordersid.','.$cart[$i]->price.', '.$cart[$i]->quantity.')');
}

// Clear all products in cart
unset($_SESSION['cart']);

?>
Thanks for buying products. Click <a href="order_guest.php">here</a> to if you want to buy again.  Click <a href="index.php#guest">here</a> to if you want to exit.