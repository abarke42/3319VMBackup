<?php
session_start();

	include "connecttodb.php";

	$firstName = $_POST["newFirstName"];
	$lastName = $_POST["newLastName"];
	$city = $_POST["newCity"];
	$phoneNum = $_POST["newPhoneNum"];
	$agent = $_POST["whichAgent"];

	$query= 'INSERT INTO customers(customerID, firstName, lastName, 
	city, phoneNum, agent) VALUES("' . $_SESSION["newCustomerID"]  . 
	'", "' . $firstName . '", "' . $lastName . '", "' . $city . '", "' . 
	$phoneNum . '", "' . $agent . '");';

	if (!mysqli_query($connection,$query)) {
		die ("Error while trying to add new customer" . 
		mysqli_error($connection));
	} else {
		header('Location: splendidSports.php');
		//send back to the main page once it is done
		exit;
	
}
?>
