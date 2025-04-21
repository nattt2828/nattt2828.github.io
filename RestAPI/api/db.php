<?php
$host = 'localhost';
$db = 'your_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];
try {
$pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
http_response_code(500);
echo json_encode(["error" => "Database connection failed"]);
exit;
}
?>