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
	$_SESSION["customerToPurchase"] = $_POST["pickACustomer"];
	$query = "SELECT firstName, lastName FROM customers 
	WHERE customerID=". $_POST["pickACustomer"] . ";";
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
<form action="purchaseQuantitySelect.php" method="post">
<select name="pickAProduct" id="pickAProduct">
  <option value="1">Select Here</option>

<?php
        include "getProduct.php";
?>

</select>

<?php
 if (isset($_POST['pickAProduct'])) {
        $whichProd = $_POST['pickAProduct'];
        //get selected product from the form
        $_SESSION["productToPurchase"] = $whichProd;

        $query = "SELECT description FROM products
        WHERE productID=". $whichProd . ";";
        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on product description failed.");
        }
        $row = mysqli_fetch_assoc($result);
        echo "<h5>" . $row["description"];
	echo S_SESSION["productToPurchase"];

        mysqli_free_result($result);
}

?>

<br><br>
</form>


3. Quantity: <br><br>

<hr>

</body>
</html>
