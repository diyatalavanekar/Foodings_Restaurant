<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <style>
        /* General Page Styling */
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
        }

        .topnav a {
            display: inline-block;
            color: rgb(48,47,81);
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
        }

        .topnav a:hover {
            background-color: rgb(48,47,81);
            color: white;
        }

        /* Login Box Styling */
        .login-container {
            width: 350px;
            margin: 80px auto;
            padding: 30px;
            border: 2px solid rgb(48,47,81);
            border-radius: 10px;
            background: #f9f9f9;
            color: rgb(48,47,81);
            box-shadow: 0px 0px 10px gray;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid rgb(48,47,81);
            border-radius: 5px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: rgb(48,47,81);
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: rgb(30,29,60);
        }
    </style>
</head>

<body>

    

    <!-- Admin Login Box -->
    <div class="login-container">
        <h2>Admin Login</h2>

        <form action="admin_login_process.php" method="post">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
