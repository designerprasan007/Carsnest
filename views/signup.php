<?php 
	include "classes/init.php";
	if (isset($_POST['submit'])) {
		$data = [
			"username"=>$_POST['username'],
			"password"=>$_POST['password'],
			"c_password"=>$_POST['c_password']
			"p_error" =>''
		];

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<form>
		<input type="text" name="username"><br>
		<input type="password" name="password"><br>
		<input type="password" name="c_password"><br>
		<button type="submit" name="submit">signup</button>
	</form>
	<a href="login.php">login</a>
</body>
</html>