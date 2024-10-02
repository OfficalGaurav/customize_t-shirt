<?php
// Include the connection file
require('connection.php');

// Check if username is provided
if (!isset($_GET['username'])) {
    die("No username provided.");
}

$username = $_GET['username'];

// Delete user
$query = "DELETE FROM fullregistered_users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    echo "User deleted successfully.";
} else {
    echo "Error deleting user: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);
?>

<a href="manage_users.php">Back to Manage Users</a>
