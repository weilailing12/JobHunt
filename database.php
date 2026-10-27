<?php
$host = 'localhost';
$db   = 'jobhunt_db'; // Make sure this database exists in your phpMyAdmin
$user = 'root';
$pass = ''; // Default XAMPP password is usually blank

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('The service is temporarily unavailable. Please try again later.');
}
?>
