<?php
// Database Connection
$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Create database if it doesn't exist
$dbname = 'pit5nako';
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database '$dbname' created successfully or already exists.\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// Create users table if it doesn't exist
$tableSql = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table 'users' created successfully or already exists.\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
?>
