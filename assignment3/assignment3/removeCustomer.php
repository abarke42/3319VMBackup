<?php
session_start();

	include "connecttodb.php";

	$customerID = $_SESSION["customerToDelete"];

	$query= 'DELETE FROM customers WHERE customerID = "' . $customerID . '";';

	if (!mysqli_query($connection,$query)) {
		die ("Error while trying to delete customer" . 
		mysqli_error($connection));
	} else {
		header('Location: splendidSports.php');
		//send back to the main page once it is done
		exit;
	
	}
?>
