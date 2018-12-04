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
<script src="product.js"></script>

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

<?php
	$query = "SELECT firstName, lastName FROM customers 
	WHERE customerID=". $_SESSION["customerToPurchase"] . ";";
	$result = mysqli_query($connection, $query);

	if (!$result) {
        	die("databases query on customer name failed.");
	}
	$row = mysqli_fetch_assoc($result);
	echo "<h5>" . $row["firstName"] . " " . $row["lastName"];
	
	mysqli_free_result($result);
?>

<br><br>

2. Choose the Product Being Purchased:
<br>

<?php
        $query = "SELECT description FROM products
        WHERE productID=". $_SESSION["productToPurchase"] . ";";
        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on product description failed.");
        }
        $row = mysqli_fetch_assoc($result);
        echo "<h5>" . $row["description"];

        mysqli_free_result($result);

?>

<br><br>

<form action="addPurchase.php" method="post">

3. Quantity: <input type="text" name="purchaseQuantity"><br><br>

Please double check the purchase information below.<br>

<?php
        $query = "SELECT firstName, lastName FROM customers
        WHERE customerID=". $_SESSION["customerToPurchase"] . ";";
        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on customer name failed.");
        }
        $row = mysqli_fetch_assoc($result);
        echo "<h5>Customer: " . $row["firstName"] . " " . $row["lastName"];

        mysqli_free_result($result);

	
	echo "<br>";

	$query = "SELECT description FROM products
        WHERE productID=". $_SESSION["productToPurchase"] . ";";
        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on product description failed.");
        }
        $row = mysqli_fetch_assoc($result);
        echo "<h5>Product: " . $row["description"];

        mysqli_free_result($result);

	
	echo "<br><br>";
	
	echo "Quantity: " . $_POST["purchaseQuantity"] . "<br><br>";
	$_SESSION["purchaseQuantity"] = $_POST["purchaseQuantity"];

?>

<input type="submit" class="button" value="Purchase Product">

<hr>

</form>
</body>
</html>
