<?php
// Include the connection file
require('connection.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize form data
    $username = $_POST['username']; // Username used to identify the user
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);

    // Validate form data
    if (empty($full_name) || empty($email)) {
        die("All fields are required.");
    }

    // Prepare and execute the update query
    $query = "UPDATE fullregistered_users SET full_name = ?, email = ? WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $full_name, $email, $username);

    if ($stmt->execute()) {
        // Redirect to the manage users page after successful update
        header("Location: manage_users.php");
        exit();
    } else {
        die("Error updating user: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>
