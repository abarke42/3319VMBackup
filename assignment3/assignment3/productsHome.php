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

<?php
	include "connecttodb.php";
?>
<h1>Our Products </h1>

<div class="main-banner">
	<div class="tabs">
            <a href="splendidSports.php" class="banner-item">Customers</></a>
            <a href="productsHome.php" class="banner-item">Products</></a>
        </div>
</div>

Customers Purchasing More Products than Given Quantity
<form action="largePurchases.php" method="post">
    <br>Quantity: <input type="text" name="quantity"><br>
	<br>
	<input type="submit" class="button" value="See Purchases">


<?php
	$query = 'SELECT lastName, description, purchases.quantity FROM customers,
	 products, purchases WHERE customers.customerID=purchases.customerID 
	AND purchases.productID=products.productID;';
?>

<hr>

<a class="button" href="unpurchasedProducts.php">Products Not Yet Purchased</a>

<hr>

<a class="button" href="totalPurchase.php">Total Number of Purchases</a>
<hr>
</body>
</html>
