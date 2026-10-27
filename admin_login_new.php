<?php
declare(strict_types=1);

require __DIR__ . '/admin_bootstrap.php';
require __DIR__ . '/database.php';

if (($_SESSION['admin_logged_in'] ?? false) === true) {
    header('Location: admin_dashboard.php');
    exit;
}

$error = '';
$windowSeconds = 300;
$maxAttempts = 5;
$now = time();
$failures = array_values(array_filter(
    $_SESSION['admin_login_failures'] ?? [],
    static fn($timestamp): bool => is_int($timestamp) && $timestamp > ($now - $windowSeconds)
));
$_SESSION['admin_login_failures'] = $failures;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!adminVerifyCsrf($_POST['csrf_token'] ?? null)) {
        $error = 'Your session expired. Please refresh and try again.';
    } elseif (count($failures) >= $maxAttempts) {
        $remaining = max(1, $windowSeconds - ($now - min($failures)));
        $error = 'Too many login attempts. Try again in about ' . (int) ceil($remaining / 60) . ' minute(s).';
    } else {
        $username = is_string($_POST['username'] ?? null) ? mb_substr(trim($_POST['username']), 0, 50) : '';
        $password = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';

        if ($username === '' || $password === '') {
            $error = 'Please fill in both fields.';
        } else {
            try {
                $stmt = $pdo->prepare('SELECT id, username, password FROM admin_users WHERE username = ? LIMIT 1');
                $stmt->execute([$username]);
                $adminUser = $stmt->fetch();
                $storedPassword = $adminUser['password'] ?? '';
                $usesLegacyHash = (bool) preg_match('/^[a-f0-9]{64}$/i', $storedPassword);
                $passwordValid = $adminUser && (
                    password_verify($password, $storedPassword) ||
                    ($usesLegacyHash && hash_equals(strtolower($storedPassword), hash('sha256', $password)))
                );

                if ($passwordValid) {
                    if ($usesLegacyHash || password_needs_rehash($storedPassword, PASSWORD_DEFAULT)) {
                        $update = $pdo->prepare('UPDATE admin_users SET password = ? WHERE id = ?');
                        $update->execute([password_hash($password, PASSWORD_DEFAULT), $adminUser['id']]);
                    }
                    session_regenerate_id(true);
                    unset($_SESSION['admin_login_failures']);
                    $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_username'] = $adminUser['username'];
                    $_SESSION['admin_id'] = (int) $adminUser['id'];
                    header('Location: admin_dashboard.php');
                    exit;
                }

                $_SESSION['admin_login_failures'][] = $now;
                $error = 'Invalid username or password.';
            } catch (PDOException $e) {
                error_log('Admin login failed: ' . $e->getMessage());
                $error = 'The login service is unavailable. Please try again later.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Job Hunt</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body class="login-page">
<main class="login-card">
    <img class="login-brand" src="assets/JobHunt logo.png" alt="Job Hunt">
    <h1>HR Portal Access</h1>
    <p class="sub">Authorised personnel only</p>
    <?php if ($error): ?><div class="error-box" role="alert"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form action="admin_login.php" method="post">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(adminCsrfToken()) ?>">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" maxlength="50" required autocomplete="username" value="<?= htmlspecialchars(is_string($_POST['username'] ?? null) ? $_POST['username'] : '') ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">
        </div>
        <button class="btn btn-primary" type="submit">Log in to dashboard</button>
    </form>
</main>
</body>
</html>
