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

if ($_SESSION["sortMethod"] == 1 OR $_SESSION["sortMethod"] == NULL) {
$query = "SELECT description, cost FROM products WHERE products.productID IN
(SELECT productID FROM purchases WHERE customerID=" . $whichCus . ")
ORDER BY description;";  
}

if ($_SESSION["sortMethod"] == 2) {
$query = "SELECT description, cost FROM products WHERE products.productID IN
(SELECT productID FROM purchases WHERE customerID=" . $whichCus . ")
ORDER BY description DESC;";
}


if ($_SESSION["sortMethod"] == 3) {
$query = "SELECT description, cost FROM products WHERE products.productID IN
(SELECT productID FROM purchases WHERE customerID=" . $whichCus . ")
ORDER BY cost;";
}


if ($_SESSION["sortMethod"] == 4) {
$query = "SELECT description, cost FROM products WHERE products.productID IN
(SELECT productID FROM purchases WHERE customerID=" . $whichCus . ")
ORDER BY cost DESC;";
}


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
