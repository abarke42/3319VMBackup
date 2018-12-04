<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Purchase</title>
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

1. Choose the Customer Completing the Purchase:
<br>
<form action="purchaseProductSelect.php" method="post">

<select name="pickACustomer" id="pickACustomer">
  <option value="1">Select Here</option>

<?php
        include "getCustomer.php";
?>

</select>

<?php

?>

<br><br>
</form>

2. Choose the Product Being Purchased:
<br>

<br><br>


3. Quantity: <br><br>

<hr>

</form>
</body>
</html>
