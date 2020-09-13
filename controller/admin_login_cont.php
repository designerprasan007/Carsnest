<?php 
session_start();
// require_once('database.php');
require_once('../config/db.php');
if($_POST)
$email = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


 $query = "SELECT * FROM `admin` WHERE username='$email' and password='".md5($password)."'";
 $result = mysqli_query($conn,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
 $user = $result->fetch_object();
    if($rows==1){
	header("Location: http://localhost/carsnest/views/admin_view.php");
	$_SESSION['username'] = $user->username;
    }
    else{
    	header("Location: http://localhost/carsnest/views/login.php");
		$_SESSION['message'] = "wrong email or password"; 
    }
?>