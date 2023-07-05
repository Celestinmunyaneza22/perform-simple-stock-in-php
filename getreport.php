<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['UserName'])) {
	echo "<script>alert('can not access this page, please, login first!')</script>";
	echo "<script>window.location.replace('login.php')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<h2>Product Out Report</h2>
	<table border="1" style="width: 70%;">
		<thead>
			<th>ProductCode</th>
			<th>ProductName</th>
			<th> ProductIn Date</th>
			<th>Quantity</th>
			<th>UniquePrice</th>
			<th>TotalPrice</th>
		</thead>
		<tbody>
			<?php
			$count=1;
			if (isset($_POST['send'])) {
				$startdate=$_POST['Startdate'];
				$enddate=$_POST['enddate'];
            $select=$conn->query("SELECT * FROM product p,productOut o WHERE Date>='$startdate' AND Date<='$enddate'AND p.ProductCode=o.ProductCode") or die("select fail");
            while ($row=mysqli_fetch_array($select)):
			?>
			<tr>
				<td><?php echo $count++;?></td>
				<td><?php echo $row['ProductName'];?></td>
				<td><?php echo $row['Date'];?></td>
				<td><?php echo $row['Quantity'];?></td>
				<td><?php echo $row['UniquePrice'];?></td>
				<td><?php echo $row['TotalPrice'];?></td>
				
			</tr>
		<?php endwhile;}?>
		</tbody>
		
	</table><br><br>
<h2>Product In Report</h2>
<table border="1" style="width: 70%;">
		<thead>
			<th>ProductCode</th>
			<th>ProductName</th>
			<th> ProductIn Date</th>
			<th>Quantity</th>
			<th>UniquePrice</th>
			<th>TotalPrice</th>
		</thead>
		<tbody>
			<?php
			$count=1;
			if (isset($_POST['send'])) {
				$startdate=$_POST['Startdate'];
				$enddate=$_POST['enddate'];
            $select=$conn->query("SELECT * FROM product p,productin i WHERE Date>='$startdate' AND Date<='$enddate' AND p.ProductCode=i.ProductCode" ) or die("select fail");
            while ($row=mysqli_fetch_array($select)):
			?>
			<tr>
				<td><?php echo $count++;?></td>
				<td><?php echo $row['ProductName'];?></td>
				<td><?php echo $row['Date'];?></td>
				<td><?php echo $row['Quantity'];?></td>
				<td><?php echo $row['UniquePrice'];?></td>
				<td><?php echo $row['TotalPrice'];?></td>
				
			</tr>
		<?php endwhile;}?>
		</tbody>
		
	</table>
	</center>
	<p><a href="index.php"><button style="box-shadow: 2px 4px 7px green;">Go on index</button></a></p>