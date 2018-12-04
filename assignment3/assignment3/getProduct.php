<?php
$query = "SELECT * FROM products ORDER BY products.description";
$result = mysqli_query($connection,$query);

if (!$result) {
        die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row["productID"]. "'>" . $row["description"] . "</option>";
}

mysqli_free_result($result);
?>
