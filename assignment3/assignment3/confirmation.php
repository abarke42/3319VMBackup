<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete A Customer</title>
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
            <a href="splendidSportsInfo.php" class="banner-item">Products</></a>
        </div>
</div>

Are you sure you want to delete the following customer?
<br>
<?php
	$query = "SELECT firstName, lastName FROM customers WHERE customerID=".
        $_SESSION["customerToDelete"] . ";";
        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("databases query on customer name failed.");
        }
        $row = mysqli_fetch_assoc($result);
        echo "<h5>" . $row["firstName"] . " " . $row["lastName"];

        mysqli_free_result($result);

?>
<br><br>
<a class="button" href="removeCustomer.php">Yes</a>
<a class="button" href="deleteCustomer.php">No</a>

</form>
</body>
</html>
