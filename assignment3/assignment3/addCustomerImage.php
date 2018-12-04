<?php
session_start();

	include "connecttodb.php";

	$cusImage = $_POST["newURL"];

	$query= 'UPDATE customers SET cusimage="' . $cusImage . '" WHERE 
	customerID="' . $_SESSION["customerImage"] . '";';

	if (!mysqli_query($connection,$query)) {
		die ("Error while trying to update customer" . 
		mysqli_error($connection));
	} else {
		header('Location: splendidSports.php');
		//send back to the main page once it is done
		exit;
	
}
?>
