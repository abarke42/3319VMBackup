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
<script src="product.js"></script>

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

Choose a Product:
<br>
<form action="" method="post">
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

        $query = "SELECT description, cost FROM products
        WHERE productID=". $whichProd . ";";
        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on product description failed.");
        }
        $row = mysqli_fetch_assoc($result);
        echo "<h5>" . $row["description"];

        mysqli_free_result($result);

	$query = 'SELECT SUM(quantity) FROM purchases WHERE purchases.productID IN 
	(SELECT productID FROM products WHERE productID=' . $whichProd . ');';

        $result = mysqli_query($connection, $query);

	if (!$result) {
                die("databases query on product description failed.");
        }
        $row2 = mysqli_fetch_assoc($result);
        if ($result->num_rows > 0){
	        echo "<h5>" . "Total purchases: " . $row2["SUM(quantity)"] . "<br>";
	}
	else{
		echo "<h5>" . "Total purchases: 0" . "<br>";
	}
	echo "Product: " . $row["description"] . "<br>" 
	. "Total money made: " . $row["cost"] * $row2["SUM(quantity)"] . " dollars"; 

        mysqli_free_result($result);
}

?>

<br><br>
</form>

<hr>

</form>
</body>
</html>
