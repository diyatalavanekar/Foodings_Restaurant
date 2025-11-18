<?php
session_start();

// Restrict access unless admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin/admin_login.php");
    exit;
}

include("../connection.php");

// Fetch all admin users
$sql = "SELECT * FROM admin_users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Users</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #777;
            padding: 10px;
            text-align: center;
        }

        table th {
            background: #222;
            color: white;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            background: #28a745;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn.delete {
            background: #d9534f;
        }

        .top-links {
            text-align: right;
            margin-bottom: 20px;
        }

        .top-links a {
            text-decoration: none;
            margin-left: 10px;
            color: blue;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="top-links">
        <a href="admin_dashboard.php">🏡 Dashboard</a>
        <a href="admin_logout.php">🚪 Logout</a>
    </div>

    <h2>Admin Users</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Admin Username</th>
            <th>Actions</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['username'] . "</td>
                        <td>
                            <button class='btn'>Edit</button>
                            <button class='btn delete'>Delete</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No Admin Users Found</td></tr>";
        }
        ?>

    </table>

</div>

</body>
</html>

<?php
$conn->close();
?>
