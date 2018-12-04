<?php
$query = "SELECT * FROM customers ORDER BY customers.lastName";
$result = mysqli_query($connection,$query);

if (!$result) {
	die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='" . $row["customerID"]. "'>" . $row["firstName"] 
	. " " . $row["lastName"] . "</option>";
}

mysqli_free_result($result);
?>
