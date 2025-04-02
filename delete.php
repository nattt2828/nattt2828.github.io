<?php
// delete.php - Delete User

// Database connection
require 'db.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get user ID from URL
$user_id = $_GET['id'];

// Prepare SQL statement to delete the user
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param('i', $user_id);

// Execute the deletion
if ($stmt->execute()) {
    // Redirect to the home page after successful deletion
    header('Location: home.php');
    exit();
} else {
    // If deletion failed, redirect to home with an error message
    header('Location: home.php?error=deletion_failed');
    exit();
}
?>
