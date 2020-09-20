<?php 
session_start();
require_once('../config/db.php');
if($_POST)
$car_name = mysqli_real_escape_string($conn, $_POST['title_car']);
$car_price = mysqli_real_escape_string($conn, $_POST['car_price']);
$pur_date = mysqli_real_escape_string($conn, $_POST['pur_date']);
$kms_driven = mysqli_real_escape_string($conn, $_POST['kms_driven']);
$fuel_type = mysqli_real_escape_string($conn, $_POST['fuel_type']);
$transmission = mysqli_real_escape_string($conn, $_POST['transmission']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$color_int = mysqli_real_escape_string($conn, $_POST['color_int']);
$color_ext = mysqli_real_escape_string($conn, $_POST['color_ext']);
$reg_state = mysqli_real_escape_string($conn, $_POST['reg_state']);
$type_ins = mysqli_real_escape_string($conn, $_POST['type_ins']);
$specification = mysqli_real_escape_string($conn, $_POST['specification']);
$main_img = time() . '_' . $_FILES['main_img']['name'];
$main_img_target = '../assets/img/' . $main_img; 

// sub image multiple files file 
	$targetDir = "../assets/img/"; 
  $allowTypes = array('jpg','png','jpeg','gif'); 
	$other_img = array_filter($_FILES['other_img']['name']);
	  if(!empty($other_img)){ 
	    foreach($_FILES['other_img']['name'] as $key=>$val){ 
	        // File upload path 
	        $fileName = time() . '_' . basename($_FILES['other_img']['name'][$key]); 
	        $targetFilePath = $targetDir . $fileName; 
	        // Check whether file type is valid 
	        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
	        if(in_array($fileType, $allowTypes)){ 
	            // Upload file to server 
	            if(move_uploaded_file($_FILES["other_img"]["tmp_name"][$key], $targetFilePath)){ 
	                // Image db insert sql 
	                $insertValuesSQL .= $fileName . '&'; 
	            } 
	    		}  
	    	}
	    }
$main_img_name = get_csv_string($main_img);

// $target = $main_img_target . $other_img_target;
function get_csv_string($image_name){
$input_main = $image_name;
$words = explode(",", $input_main);
$wordsTrimmed = array_map("trim", $words);
$csvString = implode(",", $wordsTrimmed);
return $csvString;
}

if(move_uploaded_file($_FILES['main_img']['tmp_name'], $main_img_target)){
		$upload = "INSERT INTO Cars_details (car_name, main_img, price, purchase_date, kms_driven,fuel_type, transmission, location, color_int, color_ext, registered, insurance_type, specification) VALUES('$car_name', '$main_img_name', '$car_price', '$pur_date', '$kms_driven', '$fuel_type', '$transmission', '$location', '$color_int', '$color_ext', 'reg_state', '$type_ins', '$specification')";  
			$success = mysqli_query($conn, $upload);
			echo $upload;
			if ($success) {
 			  $last_id = mysqli_insert_id($conn);
			  if(!empty($insertValuesSQL)){ 
	            $insert_sub = mysqli_query($conn, "INSERT INTO Images (sub_img, car_id) VALUES ('$insertValuesSQL', '$last_id')");
				header("Location: http://localhost/carsnest/views/admin_view.php");
				}
			}
	}	
if (isset($_POST['edit_car'])) {
	$edit_car_name = $_POST['car_edit_name'];
	$edit_car_price = $_POST['car_edit_price'];
	$edit_car_id = $_POST['car_edit_id'];
	$update_q = mysqli_query($conn, "UPDATE Cars_details SET car_name = '$edit_car_name', price = '$edit_car_price' WHERE id= '$edit_car_id'");
	header("Location: http://localhost/carsnest/views/admin_view.php");
}

if (isset($_POST['delete_car'])) {
	$delete_id = $_POST['delete_car_id'];
	$dlt_q = mysqli_query($conn, "DELETE FROM Cars_details WHERE id='$delete_id'");
	$dlt_q_sub = mysqli_query($conn, "DELETE FROM Images WHERE car_id='$delete_id'");
	header("Location: http://localhost/carsnest/views/admin_view.php");
}

?>