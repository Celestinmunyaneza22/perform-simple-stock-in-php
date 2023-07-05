<?php
session_start();
include 'conn.php';
if (isset($_POST['login'])) {
	$username=$_POST['UserName'];
	$password=$_POST['Password'];
	$select=$conn->query("SELECT * FROM shopkeeper")or die("select fail");
	while ($row=mysqli_fetch_array($select)) {
		$user=$row['UserName'];
		$pass=$row['Password'];
	}
	if ($user==$username && $pass==$password) {
		$_SESSION['UserName']=$username;
		echo "<script>alert('You are logged in successfully')</script>";
		echo "<script>window.location.replace('index.php')</script>";
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
	<a href="home.php"><button style="background-color: green;border-radius: 7px; float: right;">Back Home</button></a>
<center>
	<div id="header">
		Welcome To Stock Management System
	</div>
	<h3>Login Form</h3>
	<form action="login.php" method="POST">
	<fieldset style="width: 40%; border-radius: 6px; box-shadow: 3px 5px 8px green; margin-top: 2%;">
		<label>UserName</label>
		<input style="border-radius: 7px;" type="text" name="UserName" required placeholder="enter UserName"><br><br>
		<label>Password</label>
		<input style="border-radius: 7px;" type="Password" name="Password" required placeholder="enter Password"><br><br>
		<button type="submit" name="login" style="background-color: green; border-radius: 3px;">Login</button><br><br>
<p>Not registerd?<a style="text-decoration:none;color: pink; " href="register.php">register here</a></p>

		
	</fieldset>
</form>
</center>
</body>
</html>