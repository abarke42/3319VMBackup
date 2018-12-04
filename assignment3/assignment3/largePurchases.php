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
	<br><br>

<?php
	$quantity = $_POST["quantity"];

	$query = 'SELECT firstName, lastName, description, purchases.quantity FROM 
	customers, products, purchases WHERE customers.customerID=purchases.customerID AND 
	products.productID=purchases.productID AND purchases.quantity > ' . $quantity . ';';

       $result = mysqli_query($connection, $query);

       if (!$result) {
                die("databases query on customer, product, and purchase info failed.");
        }

	echo "Customer Name - Product - Quantity Purchased";
        while($row = mysqli_fetch_assoc($result)) {
		echo "<h5>" . $row["firstName"] . " " . $row["lastName"] . 
		" - " . $row["description"] . " - " . $row["quantity"];
	}

        mysqli_free_result($result);
?>
<br><br>
<hr>

<a class="button" href="unpurchasedProducts.php">Products Not Yet Purchased</a>

<hr>

<a class="button" href="totalPurchase.php">Total Number of Purchases</a>
<hr>

</body>
</html>
