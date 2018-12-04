<?php
$query = "SELECT * FROM agents ORDER BY agents.lastName";
$result = mysqli_query($connection,$query);

if (!$result) {
	die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='" . $row["agentID"]. "'>" . $row["firstName"] 
	. " " . $row["lastName"] . "</option>";
}

mysqli_free_result($result);
?>
