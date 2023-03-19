<?php
// Connect to the database
include_once "db_conn.php";

// Get the updated product details from the form
$item_id = $_POST['item_id'];
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];

// Prepare and execute the update query
$stmt = mysqli_prepare($conn, "UPDATE products SET item_name=?, item_price=? WHERE item_id=?");
mysqli_stmt_bind_param($stmt, "ssi", $item_name, $item_price, $item_id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
  // Redirect to the index page
  header('Location: index.php');
} else {
  echo "Error updating product: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>