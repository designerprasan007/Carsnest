<?php 
session_start();
require_once('../config/db.php');
function All_Car(){
	global $conn;
	$select = "SELECT c.*, i.* FROM Cars_details c, Images i WHERE i.car_id = c.id";
	$output = mysqli_query($conn, $select);
	return $output;
}

function single_Car($id){
	global $conn;
	$select = "SELECT c.*, i.* FROM Cars_details c, Images i WHERE i.car_id ='$id' AND i.car_id = c.id";
	$output = mysqli_query($conn, $select);
	return $output;
}

if ($_POST['search']) {
	$car_name = mysqli_real_escape_string($conn, $_POST['car_name']);
	$car_type = mysqli_real_escape_string($conn, $_POST['car_type']);
	$car_year = mysqli_real_escape_string($conn, $_POST['car_year']);

	$search = mysqli_query($conn, "SELECT * FROM Cars_details WHERE car_name LIKE '%$car_name%' OR purchase_date LIKE '%$car_year%'");
	var_dump($search);
}

 ?>