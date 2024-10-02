<?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password is usually empty for XAMPP
$dbname = "final_tshirt";  // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
