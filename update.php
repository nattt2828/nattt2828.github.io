<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $user_id = $_SESSION['user_id'];

    $query = "UPDATE users SET username=?, email=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $new_username, $new_email, $user_id);
    
    if ($stmt->execute()) {
        echo "Update successful!";
    }
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="New Username" required>
    <input type="email" name="email" placeholder="New Email" required>
    <button type="submit">Update</button>
</form>
