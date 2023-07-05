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
	<table border="1" style="width: 70%;">
		<thead>
			<th>ProductCode</th>
			<th>ProductName</th>
			<th> ProductIn Date</th>
			<th>Quantity</th>
			<th>UniquePrice</th>
			<th>TotalPrice</th>
			<th colspan="3">Action</th>
		</thead>
		<tbody>
			<?php
			$count=1;
            $select=$conn->query("SELECT * FROM product p,productin i WHERE p.ProductCode=i.ProductCode") or die("select fail");
            while ($row=mysqli_fetch_array($select)):
			?>
			<tr>
				<td><?php echo $count++;?></td>
				<td><?php echo $row['ProductName'];?></td>
				<td><?php echo $row['Date'];?></td>
				<td><?php echo $row['Quantity'];?></td>
				<td><?php echo $row['UniquePrice'];?></td>
				<td><?php echo $row['TotalPrice'];?></td>
				<td>
					<a href="add.php?add=<?php echo $row['ProductCode'];?>"><button style="background-color: lightblue;border-radius: 3px;">ADD</button></a>
					<a href="remove.php?remove=<?php echo $row['ProductCode'];?>"><button style="background-color: green;border-radius: 3px;">Remove</button></a>
					<a href="productin.php?delete=<?php echo $row['ProductCode'];?>"><button style="background-color: red;border-radius: 3px;">Delete</button></a>
				</td>
				
			</tr>
		<?php endwhile;?>
		</tbody>
		
	</table>
</center>
<?php
if (isset($_GET['delete'])) {
	$id=$_GET['delete'];
	$del1=$conn->query("DELETE FROM Product WHERE ProductCode=$id") or die("del1 fail");
	$del2=$conn->query("DELETE FROM ProductIn WHERE ProductCode=$id") or die("del2 fail");
	$del3=$conn->query("DELETE FROM ProductOut WHERE ProductCode=$id") or die("del3 fail");
	echo "<script>window.location.replace('productin.php')</script>";
}
?>
