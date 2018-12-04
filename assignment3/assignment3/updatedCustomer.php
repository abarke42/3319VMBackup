<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Customer</title>
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
            <a href="splendidSportsInfo.php" class="banner-item">Products</></a>
        </div>
</div>

Choose Customer To Update:
<br>
<form action="updateCustomer.php" method="post">

<select name="pickACustomer" id="pickACustomer">
  <option value="1">Select Here</option>

<?php
        include "getCustomer.php";
?>

</select>

<?php
	$whichCus = $_SESSION['updateCustomerID']; 
	//get updated customer from the form

	$query = "SELECT firstName, lastName, phoneNum FROM customers 
	WHERE customerID=". $whichCus . ";";
	$result = mysqli_query($connection, $query);

	if (!$result) {
        	die("databases query on customer name failed.");
	}

	$row = mysqli_fetch_assoc($result);
	echo "<h5>" . $row["firstName"] . " " . $row["lastName"];
	echo "<h5>" . "Phone Number: " . $row["phoneNum"];

	mysqli_free_result($result);

if (isset($_POST['pickACustomer'])) {
	$_SESSION["updateCustomerID"] = $_POST['pickACustomer'];
}

?>

<br><br>
</form>

<form action="changeCustomer.php" method="post">

New Phone Number: <input type="text" name="newPhoneNum"><br>
<input type="submit" value="Update customer">

<hr>

</form>
</body>
</html>
