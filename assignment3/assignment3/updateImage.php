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

<?php
	$query = "SELECT firstName, lastName, cusimage FROM customers
        WHERE customerID=". $_SESSION["customerImage"] . ";";
        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on customer name failed.");
	 }
	
	$row = mysqli_fetch_assoc($result);
        echo "<h5>" . "Updating " . $row["firstName"] . " " . $row["lastName"]
	. "'s Image:";

        mysqli_free_result($result);

?> 

<br><br>

<form action="addCustomerImage.php" method="post">

Image URL: <input type="text" name="newURL"><br><br>
<input type="submit" class="button" value="Update Customer Image">
</form> 
<hr>

<img src="http://www.csd.uwo.ca/~lreid/blendedcs3319/flippedclassroom/four/pic.png">
</body>
</html>
