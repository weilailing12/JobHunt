<?php
session_start();
include 'database.php';

$debug_msg = '';

// 1. Force insert the admin account every time the page loads to guarantee it exists with the correct hash
try {
    $username_default = 'admin';
    $password_default = 'admin995995';
    $hashedPassword = password_hash($password_default, PASSWORD_DEFAULT);

    // Check if admin exists
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username_default]);
    $admin = $stmt->fetch();

    if (!$admin) {
        // Insert if not exists
        $insert = $pdo->prepare("INSERT INTO admin_users (username, password) VALUES (?, ?)");
        $insert->execute([$username_default, $hashedPassword]);
    } else {
        // Force update the password every time just to be 100% sure it matches 'admin995995'
        $update = $pdo->prepare("UPDATE admin_users SET password = ? WHERE username = ?");
        $update->execute([$hashedPassword, $username_default]);
    }
} catch (Exception $e) {
    $debug_msg = "Database Error: " . $e->getMessage();
}

// Redirect if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_dashboard.php");
    exit();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($password)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
            $stmt->execute([$username]);
            $adminUser = $stmt->fetch();

            if ($adminUser) {
                // Verify password
                if (password_verify($password, $adminUser['password'])) {
                    session_regenerate_id(true);
                    
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_username']  = $adminUser['username'];
                    $_SESSION['admin_id']        = $adminUser['id'];

                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    $error = "Password verification failed for username: " . htmlspecialchars($username);
                }
            } else {
                $error = "Username not found in database: " . htmlspecialchars($username);
            }
        } catch (PDOException $e) {
            $error = "Query Error: " . $e->getMessage();
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Admin Login - JobHunt</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .login-card { background: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 380px; border: 1px solid #e1e4e8; }
        .login-card h2 { margin-top: 0; color: #1b365d; font-size: 22px; text-align: center; margin-bottom: 8px; }
        .login-card p.sub { text-align: center; color: #666; font-size: 13px; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box; }
        .error-box { background: #f8d7da; color: #721c24; padding: 12px; border-radius: 6px; border: 1px solid #f5c6cb; font-size: 14px; margin-bottom: 20px; text-align: center; }
        .debug-box { background: #d1ecf1; color: #0c5460; padding: 10px; border-radius: 6px; font-size: 12px; margin-bottom: 15px; }
        .btn-login { width: 100%; background: #1b365d; color: #ffffff; padding: 12px; border: none; border-radius: 6px; font-size: 15px; font-weight: bold; cursor: pointer; transition: background 0.2s; }
        .btn-login:hover { background: #132744; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>HR Portal Access</h2>
    <p class="sub">Authorized personnel only</p>

    <?php if ($debug_msg): ?>
        <div class="debug-box"><?php echo htmlspecialchars($debug_msg); ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error-box"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form action="admin_login.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required placeholder="Enter admin username" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter password">
        </div>

        <button type="submit" class="btn-login">Login to Dashboard</button>
    </form>
</div>

</body>
</html>