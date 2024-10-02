<?php require('connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        body {
            background: radial-gradient(circle, rgba(2, 0, 36, 1) 0%, rgba(7, 7, 28, 1) 35%, rgba(0, 212, 255, 1) 100%);
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #2E3192;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            margin: 100px auto;
            color: #FDFCFB;
        }

        .form-btn {
            background-color: #008CBA;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-btn:hover {
            background-color: #007B9A;
            transform: scale(1.05);
        }

        .form-btn:active {
            background-color: #005f6b;
        }

        .error-msg {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }

        h3 {
            color: #FDFCFB;
            font-size: 28px;
            margin-bottom: 20px;
        }

        input[type="text"],
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

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #FDFCFB;
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

        p {
            font-size: 16px;
            margin-top: 20px;
            color: #FDFCFB;
        }

        a {
            color: #008CBA;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="fixed-header">
        <h1><marquee><img src="image/p6.jpg" width="50" height="33" border="2"><strong>Welcome to our Online Printed T-Shirt Designing Project Chad</strong></marquee></h1>
    </div>

    <div class="form-container">
        <?php
        // Initialize error array
        $error = [];

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Retrieve and sanitize form data
            $fullname = htmlspecialchars($_POST['fullname']);
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password']; // Ideally, hash the password before storing it

            // Validate form data
            if (empty($fullname) || empty($username) || empty($email) || empty($password)) {
                $error[] = 'All fields are required.';
            }

            // Check if the username already exists
            $stmt = $conn->prepare("SELECT * FROM fullregistered_users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $error[] = 'Username already exists.';
            }
            $stmt->close();

            // If no errors, process registration
            if (count($error) === 0) {
                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO fullregistered_users (full_name, username, email, password) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $fullname, $username, $email, $password);

                // Execute the statement
                if ($stmt->execute()) {
                    // Redirect to the success page
                    header("Location: zzzzz111.html");
                    exit();
                } else {
                    echo "<script>alert('Error: " . $stmt->error . "');</script>";
                }

                // Close the statement
                $stmt->close();
            }
        }

        // Close the database connection
        mysqli_close($conn);
        ?>

        <form action="" method="post">
            <h3>Register Now</h3>
            <?php
            if (isset($error) && count($error) > 0) {
                foreach ($error as $errorMsg) {
                    echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
            }
            ?>
            <input type="text" name="fullname" required placeholder="Enter your full name" autocomplete="name"><br>
            <input type="text" name="username" required placeholder="Enter your username" autocomplete="username"><br>
            <input type="email" name="email" required placeholder="Enter your email" autocomplete="email"><br>
            <input type="password" name="password" required placeholder="Enter your password" autocomplete="new-password"><br>
            <input type="submit" name="submit" value="Register Now" class="form-btn"><br>
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>
    </div>

</body>
</html>