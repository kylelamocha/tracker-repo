<?php
    
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "tracker_db";

    $database= new mysqli( $dbhost, $dbuser, $dbpass, $db, "3306"); //add port number mine is 3307
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>