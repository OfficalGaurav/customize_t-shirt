<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background: radial-gradient(circle, rgba(2, 0, 36, 1) 0%, rgba(7, 7, 28, 1) 35%, rgba(0, 212, 255, 1) 100%);
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #2E3192;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            margin: 100px auto;
            color: #FDFCFB;
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

        h2 {
            color: #FDFCFB;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
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

        input[type="text"]:focus,
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
   button:hover {
            background-color: #007B9A;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
  <div class="fixed-header">
        <h1><marquee><img src="image/p6.jpg" width="50" height="33" border=2><strong>Welcome to our Online Printed T-Shirt Designing Project Chad</strong></marquee></h1>
    </div>


    <div class="container">
        <h2>Admin Login</h2>
        <form method="POST" action="admin_login.php">
            <label for="username"><strong>Username:</strong></label>
            <input type="text" id="username" name="username" required>

            <label for="password"><strong>Password:</strong></label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>

    <?php
    // admin_login.php
    session_start();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate credentials
        if ($username === 'root' && $password === '123') {
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin_page.php"); // Redirect to admin page
            exit();
        } else {
            echo '<div style="color: red; text-align: center;">Invalid username or password</div>';
        }
    }
    ?>
</body>
</html>
