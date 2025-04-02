<?php
// User Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: home.php');
    } else {
        $error = 'Invalid credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(22, 0, 0);
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
            background-color:rgb(0, 0, 0);
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
        .register-link {
            text-align: center;
            margin-top: 15px;
        }
        .register-link a {
            color: #ffcccc;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>LOGIN FORM</h2>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            <a href="register.php">Don't have an account? Register here</a>
        </div>
    </div>
</body>
</html>
