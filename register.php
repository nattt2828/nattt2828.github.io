<?php
// User Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $username, $email, $password);
    $stmt->execute();
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #330000;
            color: #fff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #660000;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #ffcccc;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #990000;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #330000;
            color: #fff;
        }
        button {
            background-color: #990000;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #cc0000;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
        }
        .login-link a {
            color: #ffcccc;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>REGISTRATION FORM</h2>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="login-link">
            <a href="login.php">Already have an account? Login here</a>
        </div>
    </div>
</body>
</html>
