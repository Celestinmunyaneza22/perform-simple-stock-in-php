<?php
include 'conn.php';
if (isset($_POST['register'])) {
	$UserName=$_POST['UserName'];
	$Password=$_POST['Password'];
	$insert=$conn->query("INSERT INTO shopkeeper(UserName,Password) VALUES('$UserName','$Password')") or die("insert fail");
	if ($insert) {
		echo "<script>alert('You are registered successfully')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		a:hover{
			font-size: 20px;
		}
		#header{
			width: 40%;
			height: 2rem;
			box-shadow: 5px 8px 10px green;
		}
	</style>
</head>
<body>
<center>
	<div id="header">
		Welcome To Stock Management System
	</div>
	<h3>Register Form</h3>
	<form action="register.php" method="POST">
	<fieldset style="width: 40%; border-radius: 6px; box-shadow: 3px 5px 8px green; margin-top: 2%;">
		<label>UserName</label>
		<input style="border-radius: 7px;" type="text" name="UserName" required placeholder="enter UserName"><br><br>
		<label>Password</label>
		<input style="border-radius: 7px;" type="Password" name="Password" required placeholder="enter Password"><br><br>
		<button type="submit" name="register" style="background-color: green; border-radius: 3px;">Register</button><br><br>
		<p>Already registerd?<a style="text-decoration:none;color: pink; " href="login.php">login here</a></p>

		
	</fieldset>
</form>
</center>
</body>
</html>