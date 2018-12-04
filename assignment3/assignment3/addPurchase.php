<?php
session_start();

	include "connecttodb.php";

	$customerID = $_SESSION["customerToPurchase"];
	$productID = $_SESSION["productToPurchase"];
	$quantity = $_SESSION["purchaseQuantity"];

	$query='SELECT * FROM purchases WHERE customerID=' . $customerID . ' AND 
	productID=' . $productID . ';';
	
	$result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on validation failed.");
        }

        $row = mysqli_fetch_assoc($result);

	$currentQuantity = $row["quantity"];

	$newQuantity = $currentQuantity + $quantity;	

	$query= 'INSERT INTO purchases(productID, customerID, quantity)
 	VALUES("' . $productID  . '", "' . $customerID . '", "' . $quantity . '")
	ON DUPLICATE KEY UPDATE quantity=' . $newQuantity . ';';
	
	if (!mysqli_query($connection,$query)) {
		die ("Error while trying to add new customer" . 
		mysqli_error($connection));
	} else {
		header('Location: splendidSports.php');
		//send back to the main page once it is done
		exit;
	
}
?>
