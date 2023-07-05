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
	
	</center>
</body>
</html><form  method="POST">
		<fieldset style="width: 40%;border-radius: 6px; box-shadow: 3px 5px 8px blue;padding: 7px;">
			<label>Quantity</label>
			<input type="number" name="Quantity" required><br><br>
			<button type="submit" name="remove" style="background-color: green; border-radius: 3px;">Save</button>
		</fieldset>
	</form>
<?php
if (isset($_GET['remove'])) {
	$id=$_GET['remove'];
	
	$select=$conn->query("SELECT * FROM ProductIn");
	while ($row=mysqli_fetch_array($select)) {
		$Quantity=$row['Quantity'];
		$dat=$row['Date'];
		$unprice=$row['UniquePrice'];
		//$totalin=$row['TotalPrice'];
	}
	$select=$conn->query("SELECT * FROM ProductOut");
	while ($row=mysqli_fetch_array($select)) {
		$Qunty=$row['Quantity'];
		$totalout=$row['TotalPrice'];
	}
}
if (isset($_POST['remove'])) {
	$quanty=$_POST['Quantity'];
	$qtyin=$Quantity-$quanty;
	$qtout=$Qunty+$quanty;
	$totin=$qtyin*$unprice;
	$totout=$qtout*$unprice;
	if ($Quantity<$quanty) {
		echo "<script>alert('you have not enought quantity to remove')</script>";
	}
	else{
	$update1=$conn->query("UPDATE ProductIn SET Quantity='$qtyin',TotalPrice='$totin' WHERE ProductCode=$id ");
	$update2=$conn->query("UPDATE ProductOut SET Quantity='$qtout',TotalPrice='$totout',Date='$dat', UniquePrice='$unprice' WHERE ProductCode=$id ");
	if ($update1 && $update2) {
		echo "<script>alert('product updated successfully')</script>";
		echo "<script>window.location.replace('productin.php')</script>";

	}
	}

}
?>