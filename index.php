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
	<form action="index.php" method="POST">
		<fieldset style="width: 50%;border-radius: 6px; box-shadow: 3px 5px 8px blue;padding: 15px;">
			<table><tr>
			<td><label>ProductName</label></td>
			<td><input style="border-radius: 6px;" type="text" name="ProductName" required></td></tr>
			<tr><td><label>Date</label></td>
			<td><input style="border-radius: 6px;" type="date" name="Date" required></td></tr>
			<tr><td><label>Quantity</label></td>
			<td><input style="border-radius: 6px;" type="number" name="Quantity" required></td></tr>
			<tr><td><label>UniquePrice</label></td>
			<td><input style="border-radius: 6px;" type="number" name="UniquePrice" required></td></tr>
			<tr><td></td><td><button type="submit" name="save" style="background-color: green; border-radius: 3px;">Save</button></td></tr>
			</table>

		</fieldset>
	</form>
	</center>
</body>
</html>
<?php
if (isset($_POST['save'])) {
   $ProductName=$_POST['ProductName'];
   $date=$_POST['Date'];
   $Quantity=$_POST['Quantity'];
   $UniquePrice=$_POST['UniquePrice'];
   $totalPrice=$Quantity*$UniquePrice;
   $insert1=$conn->query("INSERT INTO Product(ProductName) VALUES('$ProductName')") or die("insert1 fail");
    $insert2=$conn->query("INSERT INTO ProductIn(Date,Quantity,UniquePrice,totalPrice) VALUES('$date',' $Quantity','$UniquePrice','$totalPrice')") or die("insert2 fail");
    $insert3=$conn->query("INSERT INTO ProductOut(Date,Quantity,UniquePrice,totalPrice) VALUES(0,0,0,0)") or die("insert3 fail");

}
?>