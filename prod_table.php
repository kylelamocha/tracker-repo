<?php
include ("db.php");

$db= $database;
$tableName="products";
$columns= ['prod_ID', 'prod_img', 'prod_name','prod_price','prod_stock'];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns product table must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "product table is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY prod_ID ASC";
//$query = " select * from products";
$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "Product table is empty"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}


?>