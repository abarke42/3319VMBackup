<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
        <title>Add Customer</title>
        <link rel="stylesheet" type="text/css" href="splendidSports.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>

<body>
<?php
      //connect to the database
          include "connecttodb.php";

      //generate new customer ID

	$query = "SELECT MAX(customerID) FROM customers;";
	$result = mysqli_query($connection,$query);

	if (!$result) {
        	die("databases query failed.");
	}

	$row = mysqli_fetch_assoc($result);
	$_SESSION["newCustomerID"] = $row["MAX(customerID)"] + 1;
	
	mysqli_free_result($result);
?>
<h1> Add A New Customer</h1>
Please enter the following information:

<form action="addCustomer.php" method="post">
    Customer ID: 
<?php
	echo $_SESSION["newCustomerID"];
?> 
    <br>First Name: <input type="text" name="newFirstName"><br>
    Last Name: <input type="text" name="newLastName"><br>
    City: <input type="text" name="newCity"><br>
    Phone Number: <input type="text" name="newPhoneNum"><br>
    Agent: <select name="whichAgent">

<?php
    //get all the agent names
        include "getAgent.php";
?>

        </select>
    <br><br>
  <input type="submit" class="button" value="Add customer">
  <hr>
</form>

</body>
</html>
