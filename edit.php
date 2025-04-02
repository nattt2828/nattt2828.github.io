<?php
// edit.php - User Edit Page

// Database connection
require 'db.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit();
}

// Get user ID from URL
$user_id = $_GET['id'];

// Fetch user data from the database
$result = $conn->query("SELECT id, username, email FROM users WHERE id = $user_id");
$user = $result->fetch_assoc();

// If no user found, redirect to the home page
if (!$user) {
    header('Location: home.php');
    exit();
}

// Process form submission to update user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update the user data in the database
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param('ssi', $username, $email, $user_id);
    $stmt->execute();

    // Redirect back to home after successful update
    header('Location: home.php');
    exit();
}
?>

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
        

/* Form styling */
form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    background-color: #660000;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    margin: 0 auto;
    width: 100%;
}

input {
    padding: 10px;
    border: 1px solid #990000;
    border-radius: 4px;
    background-color: #330000;
    color: white;
    width: 30%;
}

button {
    background-color: #990000;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 20%;
}

button:hover {
    background-color: #cc0000;
}

a {
    color: #ffcccc;
    text-decoration: none;
    margin-top: 10px;
    display: inline-block;
    text-align: center;
    padding-top: 10px;
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

                <!-- Display the current user info in a form -->
                <form action="edit.php?id=<?= $user['id'] ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                    <button type="submit">Update</button>
                    <a href="home.php">Cancel</a>
                </form>

                

            </div>
        </div>
    </div>
</body>
</html>
