<?php
//Starting session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Splendid Sports</title>
	<link rel="stylesheet" type="text/css" href="splendidSports.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<script src="customer.js"></script>

<?php
	include "connecttodb.php";
?>
<h1>Welcome to Splendid Sports' Internal Portal </h1>
<h2>Our Customers </h2>

<div class="main-banner">
	<div class="tabs">
            <a href="splendidSports.php" class="banner-item">Customers</></a>
            <a href="productsHome.php" class="banner-item">Products</></a>
        </div>
</div>

Select Customer:
<form action="" method="post">

<select name="pickACustomer" id="pickACustomer">
  <option value="1">Select Here</option>

<?php
        include "getCustomer.php";
?>

</select>
</form>

<hr>

<?php
        if (isset($_POST['pickACustomer'])) {
                include "connecttodb.php";
                include "getCustomerProduct.php";
		include "customerImage.php";
        }
?>

<hr>

Sort Purchased Products:

<form action="" method="post">
<select name="sortDropdown" id="sortDropdown">
<option value="1">Ascending Description</option>
<option value="2">Descending Description</option>
<option value="3">Ascending Price</option>
<option value="4">Descending Price</option>
</select>&nbsp;<input type="submit" class="button" name="submit" value="Refresh">
</form>

<hr>
<?php
        $_SESSION["sortMethod"] = $_POST['sortDropdown'];
?>

<a class="button" href="customerPurchase.php">Purchase Products</a>

<hr>

<a class="button" href="newCustomer.php">Add a New Customer</a>
<hr>

<a class="button" href="deleteCustomer.php">Delete a Customer</a>
<hr>

<a class="button" href="updateCustomer.php">Update Customer Contact Information</a>
<hr>

</body>
</html>
