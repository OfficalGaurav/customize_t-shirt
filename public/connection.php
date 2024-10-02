<?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password is usually empty for XAMPP
$dbname = "testing"; // Updated database name
$port = 3308;        // Updated port number

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check for connection errors
if (mysqli_connect_errno()) {
    echo "<script>alert('Failed to connect to the database: " . mysqli_connect_error() . "');</script>";
    exit();
}
?>
