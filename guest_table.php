<?php
include ("db.php");

$db= $database;
$tableName="guest_tbl";
$columns= ['g_id', 'guest_name','guest_timein','guest_status','guest_rate'];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns guest table must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "guest table is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY g_id ASC";
$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "Guest table is empty"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}


?>