<?php
// Database Connection Details
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'pit5nako';

// Connect to MySQL server (without selecting a database)
$conn = new mysqli($host, $user, $pass);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Check if the database exists
$dbCheck = $conn->select_db($dbname);

// If the database doesn't exist, create it
if (!$dbCheck) {
    $createDbSql = "CREATE DATABASE $dbname";
    if ($conn->query($createDbSql) === TRUE) {
        echo "Database '$dbname' created successfully.\n";
    } else {
        die("Error creating database: " . $conn->error);
    }
    
    // After creating the database, select it
    $conn->select_db($dbname);
}

// Create the users table if it doesn't exist
$tableSql = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the query to create the table
if ($conn->query($tableSql) === TRUE) {
    echo "Table 'users' is ready.\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection when done
$conn->close();
?>
