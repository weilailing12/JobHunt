<?php
declare(strict_types=1);

$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    (($_SERVER['SERVER_PORT'] ?? null) === '443');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header("Content-Security-Policy: frame-ancestors 'none'");

if (empty($_SESSION['admin_csrf_token'])) {
    $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));
}

function adminCsrfToken(): string
{
    return (string) ($_SESSION['admin_csrf_token'] ?? '');
}

function adminVerifyCsrf(?string $token): bool
{
    $storedToken = adminCsrfToken();
    return $storedToken !== '' && is_string($token) && hash_equals($storedToken, $token);
}

function requireAdminLogin(): void
{
    if (($_SESSION['admin_logged_in'] ?? false) !== true) {
        header('Location: admin_login.php');
        exit;
    }
}
