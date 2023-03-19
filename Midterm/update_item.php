<?php
// Connect to the database
include_once "db_conn.php";

// Get the item ID from the URL parameter
$item_id = $_GET['item_id'];

// Prepare the SQL statement
$sql = "SELECT * FROM products WHERE item_id=?";
$stmt = mysqli_stmt_init($conn);

// Check if the statement is valid
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "Error: " . mysqli_error($conn);
} else {
  // Bind the parameter
  mysqli_stmt_bind_param($stmt, "i", $item_id);

  // Execute the statement
  mysqli_stmt_execute($stmt);

  // Get the result
  $result = mysqli_stmt_get_result($stmt);

  // Fetch the row
  $row = mysqli_fetch_assoc($result);
}

// Display the form to update the item details
echo "<html>";
echo "<body>";
echo "<form method='post' action='update.php'>";
echo "<input type='hidden' name='item_id' value='".$row['item_id']."'>";

echo "<label>Product Name</label>";
echo "<input type='text' name='item_name' value='".$row['item_name']."'><br>";

echo "<label>Product Price</label>";
echo "<input type='text' name='item_price' value='".$row['item_price']."'><br>";

echo "<button type='submit'>Update</button>";
echo "</form>";

echo "</body>";
echo "</html>";


// Close the statement
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
