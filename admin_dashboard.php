<?php
// Include database connection
include 'database.php';

// Fetch job applications from database
try {
    $stmt = $pdo->query("SELECT * FROM job_applications ORDER BY created_at DESC");
    $applications = $stmt->fetchAll();
} catch (Exception $e) {
    $applications = []; // Fallback if table isn't created yet
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - JobHunt</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 1200px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        h1 { color: #1b365d; margin-bottom: 20px; font-size: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 15px; border: 1px solid #eaeaea; text-align: left; font-size: 14px; }
        th { background: #1b365d; color: #fff; }
        tr:nth-child(even) { background: #fcfcfc; }
    </style>
</head>
<body>

<div class="container">
    <h1>HR Admin Dashboard - Candidate Applications</h1>
    <p>Manage incoming applications submitted via the website.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Category</th>
                <th>Applied Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($applications)): ?>
                <?php foreach ($applications as $app): ?>
                    <tr>
                        <td><?= htmlspecialchars($app['id']) ?></td>
                        <td><?= htmlspecialchars($app['fullname']) ?></td>
                        <td><?= htmlspecialchars($app['email']) ?></td>
                        <td><?= htmlspecialchars($app['category']) ?></td>
                        <td><?= htmlspecialchars($app['created_at']) ?></td>
                        <td><a href="view_application.php?id=<?= $app['id'] ?>" style="color: #007bff; text-decoration: none; font-weight: bold;">View Details</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center; color: #777;">No job applications found in the database yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>