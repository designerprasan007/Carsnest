<?php 
session_start();
require_once('../config/db.php');
function All_Car(){
	global $conn;
	$select = "SELECT c.*, i.* FROM Cars_details c, Images i WHERE i.car_id = c.id";
	$output = mysqli_query($conn, $select);
	return $output;
}


 ?>