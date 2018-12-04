<?php
$whichCus = $_POST["pickACustomer"]; //get selected customer from the form
$sort = $_POST["sortMethod"]; //get product sort method from the form

$query = "SELECT firstName, lastName FROM customers WHERE customerID=" 
. $whichCus . ";";
$result = mysqli_query($connection, $query);

if (!$result) {
        die("databases query on customer name failed.");
}

$row = mysqli_fetch_assoc($result);
echo "<h5>" . $row["firstName"] . " " . $row["lastName"] . 
"'s Purchased Products" . "</h5>";

$query = "SELECT description, cost FROM products WHERE products.productID IN
(SELECT productID FROM purchases WHERE customerID=" . $whichCus . ")
ORDER BY description;";  
$result = mysqli_query($connection, $query); 

if (!$result) {
	die("databases query on products failed.");
}

echo "<ul>"; //put the products in an unordered bulleted list
while ($row = mysqli_fetch_assoc($result)) {
	echo "<li>";
	echo "<option>" . $row["description"] . " " . $row["cost"] 
	. "</option>";
	echo "</li>";
}

echo "</ul>"; //end the bulleted list
mysqli_free_result($result);
?>
