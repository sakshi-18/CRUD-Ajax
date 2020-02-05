<?php

$server_name = "35.244.42.216";
$user = "myuser";
$password = "sakshi";
$db_name = "ajaxdb";

$conn = new mysqli($server_name, $user, $password, $db_name);

if($conn->connect_error){
	die("Connection Refused:".$conn->connect_error);
}

//echo "Connection Established";

?>
