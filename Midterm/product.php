<?php
// Connect to the database
include_once "db_conn.php";

// Get the new product details from the form
$item_name = $_POST['new_product'];
$item_price = $_POST['newitem_price'];

// Prepare the SQL statement with placeholders for parameters
$sql = "INSERT INTO products (item_name, item_price) VALUES (?, ?)";

// Create a prepared statement
$stmt = mysqli_stmt_init($conn);

// Prepare the statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "Error: " . mysqli_error($conn);
  exit();
}

// Bind the parameters to the statement
mysqli_stmt_bind_param($stmt, "ss", $item_name, $item_price);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
  // Redirect to the index page
  header('Location: index.php');
} else {
  echo "Error: " . mysqli_error($conn);
}
