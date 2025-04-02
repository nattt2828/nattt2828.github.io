<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathaniel's Profile</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <style>
        /* Styling for the logout button */
        .main-content a {
            color: #ffcccc;
            text-decoration: none;
            font-size: 1.2rem;
            margin-bottom: 20px;
            display: inline-block;
            padding: 8px 12px;
            background-color: #990000;
            border-radius: 5px;
        }

        .main-content a:hover {
            background-color: #cc0000;
        }

        /* Table style */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #fff;
        }

        th {
            background-color: #990000;
            color: white;
        }

        tr {
            background-color: #333;
        }

        th {
            background-color: #660000;
            color: white;
            font-size: 1.1rem;
        }

        /* Edit Button Style */
        .edit-btn {
            background-color: #cc0000;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
        }

        .edit-btn:hover {
            background-color: #990000;
        }

        /* Delete Button Style */
        .delete-btn {
            background-color: #cc0000;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
        }

        .delete-btn:hover {
            background-color: #990000;
        }
    </style>

</head>
<body>
    <div class="main">
        <div class="content">
            <div class="header">
                <div class="logo">
                    <h1><span>N</span>athaniel</h1>
                </div>
                <div class="menu">
                    <a href="index.html">Home</a>
                    <a href="about.html">About Me</a>
                </div>
            </div>
            <div class="main-content">
                
                <?php
                // Display Users
                require 'db.php';
                session_start();
                if (!isset($_SESSION['user_id'])) {
                    header('Location: login.php');
                    exit();
                }
                $result = $conn->query('SELECT id, username, email FROM users');
                ?>

                <a href="logout.php">Logout</a>
                <table>
                    <tr><th>ID</th><th>Username</th><th>Email</th><th>Action</th></tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="edit-btn">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>

            </div>
        </div>
    </div>
</body>
</html>
