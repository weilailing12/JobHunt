<?php
$host = getenv('JOBHUNT_DB_HOST') ?: 'localhost';
$db   = getenv('JOBHUNT_DB_NAME') ?: 'jobhunt_db';
$user = getenv('JOBHUNT_DB_USER') ?: 'root';
$pass = getenv('JOBHUNT_DB_PASSWORD') ?: '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('The service is temporarily unavailable. Please try again later.');
}
?>
