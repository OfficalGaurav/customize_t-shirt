<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            top: 0;
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
            max-width: 800px;
            width: 100%;
            padding: 40px;
            background: #2E3192;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            margin: 100px auto;
            color: #FDFCFB;
        }

        h2 {
            color: #FDFCFB;
            margin-bottom: 20px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            border: 1px solid #FDFCFB;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #444;
        }

        button {
            background-color: #008CBA;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin: 10px;
        }

        button:hover {
            background-color: #007B9A;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="fixed-header">
        <h1><marquee><img src="image/p6.jpg" width="50" height="33" border=2><strong>Admin Dashboard - T-Shirt Designing Project</strong></marquee></h1>
    </div>

    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn">Portal
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="register_form.php">User Registration</a>
                <a href="admin_page.php">Admin Dashboard</a>
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
        <h2>Admin Dashboard</h2>

        <h3>User Management</h3>
        <button onclick="window.location.href='manage_users.php'">Manage Users</button>

        <h3>Design Management</h3>
        <button onclick="window.location.href='manage_designs.php'">Manage Designs</button>

        <h3>Order Management</h3>
        <button onclick="window.location.href='manage_orders.php'">Manage Orders</button>

        <h3>System Settings</h3>
        <button onclick="window.location.href='system_settings.php'">System Settings</button>

        <h3>Recent Activity</h3>
        <table>
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated User Profile</td>
                    <td>2024-08-25</td>
                </tr>
                <tr>
                    <td>Approved New Design</td>
                    <td>2024-08-24</td>
                </tr>
                <tr>
                    <td>Processed Order #1234</td>
                    <td>2024-08-23</td>
                </tr>
            </tbody>
        </table>

        <div class="links">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
