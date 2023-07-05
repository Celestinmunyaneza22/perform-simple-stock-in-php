<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['UserName'])) {
	echo "<script>alert('can not access this page, please, login first!')</script>";
	echo "<script>window.location.replace('login.php')</script>";
}
?>
<p><a href="logout.php"><button style="background-color: red;border-radius: 4px; float: right;">Logout</button></a></p>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<p>
		<a href="index.php"><button style="box-shadow: 2px 4px 7px green;">View Index</button></a>
		<a href="productin.php"><button style="box-shadow: 2px 4px 7px green;">ProductIn</button></a>
		<a href="Productout.php"><button style="box-shadow: 2px 4px 7px green;">ProductOut</button></a>
		<a href="report.php"><button style="box-shadow: 2px 4px 7px green;">View Report</button></a>
		<a href="print.php"><button style="box-shadow: 2px 4px 7px green;">Print Report</button></a>
	</p><br><br>
	<form action="getreport.php" method="POST">
		<label>Start Date</label>
		<input type="date" name="Startdate" placeholder="Enter start date" required>
		<label>End Date</label>
		<input type="date" name="enddate" placeholder="Enter End date" required><br><br>
		<button type="submit" name="send" style="box-shadow: 2px 4px 7px green;">GET REPORT</button>
	</form>
</center>