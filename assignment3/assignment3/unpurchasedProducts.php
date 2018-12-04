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
<h1>Our Products </h1>

<div class="main-banner">
	<div class="tabs">
            <a href="splendidSports.php" class="banner-item">Customers</></a>
            <a href="productsHome.php" class="banner-item">Products</></a>
        </div>
</div>

List of Products Not Yet Purchased:
<br>
<ul>
<?php
        $query = 'SELECT description FROM products WHERE products.productID NOT 
	IN(SELECT productID FROM purchases);';
        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on unpurchased products failed.");
        }

        while($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
                echo "<h5>" . $row["description"];
		echo "</li>";
        }

        mysqli_free_result($result);
?>
</ul>

</form>
</body>
</html>
