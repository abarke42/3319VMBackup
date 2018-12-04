<?php
session_start();

	include "connecttodb.php";

	$phoneNum = $_POST["newPhoneNum"];

	$query= 'UPDATE customers SET phoneNum="' . $phoneNum . '" WHERE 
	customerID="' . $_SESSION["updateCustomerID"] . '";';

	if (!mysqli_query($connection,$query)) {
		die ("Error while trying to update customer" . 
		mysqli_error($connection));
	} else {
		header('Location: updatedCustomer.php');
		//send back to the main page once it is done
		exit;
	
}
?>
