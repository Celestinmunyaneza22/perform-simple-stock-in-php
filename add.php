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
	<form  method="POST">
		<fieldset style="width: 40%;border-radius: 6px; box-shadow: 3px 5px 8px blue;padding: 7px;">
			<label>Quantity</label>
			<input type="number" name="Quantity" required><br><br>
			<button type="submit" name="add" style="background-color: green; border-radius: 3px;">Save</button>
		</fieldset>
	</form>
	</center>
</body>
</html>
<?php
if (isset($_GET['add'])) {
	$id=$_GET['add'];
	$select=$conn->query("SELECT * FROM ProductIn");
	while ($row=mysqli_fetch_array($select)) {
		$Quantity=$row['Quantity'];
		$uniq=$row['UniquePrice'];
	}
}
if (isset($_POST['add'])) {
	$quanty=$_POST['Quantity'];
	$qty=$Quantity+$quanty;
	$tot=$qty*$uniq;
	$update=$conn->query("UPDATE ProductIn SET Quantity='$qty',TotalPrice='$tot' WHERE ProductCode=$id ");
	if ($update) {
		echo "<script>alert('product updated successfully')</script>";
		echo "<script>window.location.replace('productin.php')</script>";

	}

}
?>