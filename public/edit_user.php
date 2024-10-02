<?php
// Include the connection file
require('connection.php');

// Check if username is provided
if (!isset($_GET['username'])) {
    die("No username provided.");
}

$username = $_GET['username'];

// Fetch user details
$query = "SELECT full_name, username, email FROM fullregistered_users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("User not found.");
}

$user = $result->fetch_assoc();
$stmt->close();
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<form action="update_user.php" method="post">
    <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
    <label>Full Name:</label>
    <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
    <input type="submit" value="Update">
</form>

</body>
</html>
