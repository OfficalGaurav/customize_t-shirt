<?php
// Include the connection file
require('connection.php');

// Fetch users from the database
$query = "SELECT full_name, username, email FROM fullregistered_users";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .action-buttons a {
            margin: 0 5px;
            text-decoration: none;
            color: blue;
        }
        .action-buttons a.delete {
            color: red;
        }
    </style>
</head>
<body>

<h1>Manage Users</h1>

<table>
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td class="action-buttons">
                <a href="edit_user.php?username=<?php echo urlencode($row['username']); ?>">Edit</a>
                <a href="delete_user.php?username=<?php echo urlencode($row['username']); ?>" class="delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
