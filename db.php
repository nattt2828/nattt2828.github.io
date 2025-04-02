<?php
// Database Connection
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'pit5nako';
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


/*

database name - pit5nako



CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



*/