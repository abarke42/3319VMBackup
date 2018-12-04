<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete A Customer</title>
	<link rel="stylesheet" type="text/css" href="splendidSports.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<script src="customer.js"></script>

<?php
	include "connecttodb.php";
?>
<h1>Our Customers </h1>

<div class="main-banner">
	<div class="tabs">
            <a href="splendidSports.php" class="banner-item">Customers</></a>
            <a href="productsHome.php" class="banner-item">Products</></a>
        </div>
</div>

Choose Customer To Delete:
<br>
<form action="" method="post">

<select name="pickACustomer" id="pickACustomer">
  <option value="1">Select Here</option>

<?php
        include "getCustomer.php";
?>

</select>

<?php
 if (isset($_POST['pickACustomer'])) {
	$whichCus = $_POST['pickACustomer']; //get selected customer from the form

	$query = "SELECT firstName, lastName FROM customers WHERE customerID=". 
	$whichCus . ";";
	$result = mysqli_query($connection, $query);

	if (!$result) {
        	die("databases query on customer name failed.");
	}
	$row = mysqli_fetch_assoc($result);
	$_SESSION["customerToDelete"] = $whichCus;
	echo "<h5>" . $row["firstName"] . " " . $row["lastName"];

	mysqli_free_result($result);
}

?>

<br><br>

<a class="button" href="confirmation.php">Delete Customer</a>

<hr>

</form>
</body>
</html>
