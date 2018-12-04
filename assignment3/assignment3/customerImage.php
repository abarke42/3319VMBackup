<?php
session_start();

	$whichCus = $_POST["pickACustomer"]; //get selected customer from the form
	$_SESSION["customerImage"] = $whichCus;
	
	$query = "SELECT firstName, lastName, cusimage FROM customers WHERE customerID=" 
	. $whichCus . ";";
	$result = mysqli_query($connection, $query);

	if (!$result) {
        	die("databases query on customer name and image failed.");
	}
	
	$row = mysqli_fetch_assoc($result);

	if($row["cusimage"] === NULL) {
		echo  "<a class='button' href='updateImage.php'>Add Image</a>";
	}
	else {
		echo "<h5>" . $row["firstName"] . " " . $row["lastName"] . 
		"'s Image" . "</h5>";
		echo "<img src=" . $row["cusimage"] . ">";
	}

	mysqli_free_result($result);
?>
