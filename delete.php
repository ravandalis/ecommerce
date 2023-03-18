Situational Case: A user has been inactive for 2 months. The system will automatically delete the user.

<?php

include_once 'db_conn.php';

// Delete inactive users after 2 months (60 days)
$query = "DELETE FROM users WHERE last_login_date < DATE_SUB(NOW(), INTERVAL 60 DAY)";

if (mysqli_query($conn, $query)) {
    echo "Inactive users deleted successfully.";
} else {
    echo "Error deleting inactive users: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
