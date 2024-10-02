<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your database password here
$dbname = "testing";
$port = 3308; // Port number

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check for connection errors
if (mysqli_connect_errno()) {
    echo "<script>alert('Failed to connect to the database: " . mysqli_connect_error() . "');</script>";
    exit();
}

// Initialize error array
$error = [];

// Handle form submission
if (isset($_POST['submit'])) {
    // Retrieve and sanitize form data
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Validate form data
    if (empty($email) || empty($password)) {
        $error[] = 'Email and Password are required.';
    } else {
        // Query to check user credentials
        $query = "SELECT * FROM fullregistered_users WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Fetch user data
        if ($user = mysqli_fetch_assoc($result)) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, set session and redirect
                session_start();
                $_SESSION['user_id'] = $user['id']; // Assuming 'id' is your user identifier
                $_SESSION['email'] = $user['email'];
                header("Location: zzzzz111.html"); // Redirect to a protected page
                exit();
            } else {
                $error[] = 'Invalid email or password.';
            }
        } else {
            $error[] = 'Invalid email or password.';
        }
    }
}

// Close the database connection
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background: radial-gradient(circle, rgba(2, 0, 36, 1) 0%, rgba(7, 7, 28, 1) 35%, rgba(0, 212, 255, 1) 100%);
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .fixed-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .fixed-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar {
            background-color: #0000ff;
            overflow: hidden;
            top: 0px;
            left: 0;
            right: 0;
            z-index: 99;
        }

        .navbar a {
            float: left;
            font-size: 14px;
            color: #fff;
            text-align: center;
            padding: 10px 16px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a:hover {
            background-color: #007B9A;
            color: #6666ff;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 17px;
            border: none;
            outline: none;
            color: #fff;
            padding: 10px 16px;
            background-color: inherit;
        }

        .dropdown:hover .dropbtn {
            background-color: #007B9A;
            color: #fff;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #FDFCFB;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .dropdown-content a {
            float: none;
            color: blue;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #66ff99;
            color: #6666ff;
        }

        .container {
            max-width: 600px;
            width: 100%;
            padding: 100px;
            background: #2E3192;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            margin: 100px auto;
        }

        h2 {
            color:#FDFCFB;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #FDFCFB;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.8s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #FDFCFB;
        }

        input[type="submit"] {
            background-color: #008CBA;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 15px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background-color: #007B9A;
            transform: scale(1.05);
        }

        .links {
            margin-top: 15px;
        }

        label {
            color: #f9f9f9; 
        }

        .links a {
            display: inline-block;
            margin: 0 10px;
            color: #007BFF;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .error-msg {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="fixed-header">
        <h1><marquee><img src="image/p6.jpg" width="50" height="33" border="2"><strong>Welcome to our Online Printed T-Shirt Designing Project Chad</strong></marquee></h1>
    </div>

    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn">Portal
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="register_form.php">User Registration</a>
                <a href="admin_page.php">Admin Registration</a>
                <a href="login.php">Member Login</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Curious
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#how-it-works">How It Works</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">About Us
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#about-us">About Us</a>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Login</h2>
        <?php
        // Display errors if any
        if (count($error) > 0) {
            foreach ($error as $errorMsg) {
                echo '<span class="error-msg">' . $errorMsg . '</span>';
            }
        }
        ?>
        <form method="POST" action="">
            <label for="email"><strong>Email:</strong></label>
            <input type="email" id="email" name="email" required autocomplete="email">

            <label for="password"><strong>Password:</strong></label>
            <input type="password" id="password" name="password" required autocomplete="current-password">

            <input type="submit" name="submit" value="Login">
        </form>

        <div class="links">
            <a href="register_form.php">Register Now</a> |
            <a href="admin.php">Admin Login</a>
        </div>
    </div>
</body>
</html>
