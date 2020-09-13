<?php 
$host = "localhost";
$uname = "root";
$pwd = "root";
$dbname = "carsnest";

$conn = new mysqli($host, $uname, $pwd, $dbname); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "connected successfully";
?>

