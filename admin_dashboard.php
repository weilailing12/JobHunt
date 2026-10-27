<?php
session_start();

// Strict Session Guarding: Redirect unauthorized visitors to login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Include database connection
include 'database.php';

// Active tab determination ('applications' or 'vacancies')
$activeTab = $_GET['tab'] ?? 'applications';

// Filter & Sort parameters
$categoryFilter = $_GET['category'] ?? '';
$sortOrder      = $_GET['sort'] ?? 'DESC';
$sortOrder      = (strtoupper($sortOrder) === 'ASC') ? 'ASC' : 'DESC';

// Standard 8 Job Categories for the filter dropdown
$jobCategories = [
    "Sales and Marketing",
    "Property and Construction",
    "Oil and Gas",
    "Human Resources and Admin",
    "Finance",
    "Accounting",
    "Business Support",
    "Information Technology"
];

// Fetch Data Based on Active Tab
try {
    if ($activeTab === 'vacancies') {
        // Fetch Employer Vacancy Submissions
        $stmt = $pdo->query("SELECT * FROM job_vacancies ORDER BY created_at $sortOrder");
        $vacancies = $stmt->fetchAll();
    } else {
        // Fetch Candidate Job Applications
        if (!empty($categoryFilter)) {
            $stmt = $pdo->prepare("SELECT * FROM job_applications WHERE category = ? ORDER BY created_at $sortOrder");
            $stmt->execute([$categoryFilter]);
        } else {
            $stmt = $pdo->query("SELECT * FROM job_applications ORDER BY created_at $sortOrder");
        }
        $applications = $stmt->fetchAll();
    }
} catch (Exception $e) {
    $applications = [];
    $vacancies = [];
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
        
        /* Header Top Section */
        .dashboard-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 2px solid #eaeaea; padding-bottom: 15px; }
        h1 { color: #1b365d; margin: 0 0 5px 0; font-size: 24px; }
        p.subtitle { color: #666; margin: 0; font-size: 14px; }
        .logout-btn { background: #dc3545; color: #fff; padding: 10px 18px; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 14px; transition: background 0.2s; }
        .logout-btn:hover { background: #c82333; }

        /* Navigation Tabs */
        .tab-container { display: flex; gap: 10px; margin-bottom: 20px; }
        .tab-link { text-decoration: none; padding: 10px 20px; font-weight: bold; font-size: 15px; color: #555; border-radius: 6px 6px 0 0; background: #f1f5f9; }
        .tab-link.active { background: #1b365d; color: #ffffff; }

        /* Filter Control Bar Styling */
        .filter-bar { display: flex; gap: 15px; align-items: center; background: #f8f9fa; border: 1px solid #eaeaea; padding: 15px 20px; border-radius: 6px; margin-bottom: 20px; flex-wrap: wrap; }
        .filter-group { display: flex; align-items: center; gap: 8px; }
        .filter-group label { font-size: 14px; font-weight: bold; color: #444; }
        .filter-group select { padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; background: #fff; }
        .filter-btn { background: #007bff; color: #fff; border: none; padding: 8px 16px; border-radius: 4px; font-weight: bold; cursor: pointer; text-decoration: none; font-size: 14px; }
        .filter-btn:hover { background: #0056b3; }
        .reset-btn { background: #6c757d; color: #fff; border: none; padding: 8px 16px; border-radius: 4px; font-weight: bold; cursor: pointer; text-decoration: none; font-size: 14px; }
        .reset-btn:hover { background: #5a6268; }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; border: 1px solid #eaeaea; text-align: left; font-size: 14px; }
        th { background: #1b365d; color: #fff; }
        tr:nth-child(even) { background: #fcfcfc; }
    </style>
</head>
<body>

<div class="container">
    
    <!-- Top Header with Welcome & Logout Button -->
    <div class="dashboard-header">
        <div>
            <h1>HR Admin Dashboard</h1>
            <p class="subtitle">
                Logged in as: <strong><?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin') ?></strong> | Manage incoming applications and job vacancy submissions.
            </p>
        </div>
        <a href="logout.php" class="logout-btn">Logout 🚪</a>
    </div>

    <!-- Navigation Tabs -->
    <div class="tab-container">
        <a href="admin_dashboard.php?tab=applications" class="tab-link <?= ($activeTab === 'applications') ? 'active' : '' ?>">
            📄 Job Applications
        </a>
        <a href="admin_dashboard.php?tab=vacancies" class="tab-link <?= ($activeTab === 'vacancies') ? 'active' : '' ?>">
            💼 Vacancy Submissions (JDs)
        </a>
    </div>

    <?php if ($activeTab === 'applications'): ?>
        <!-- ================= JOB APPLICATIONS TAB ================= -->
        <form method="GET" action="admin_dashboard.php" class="filter-bar">
            <input type="hidden" name="tab" value="applications">
            
            <div class="filter-group">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    <option value="">-- All Categories --</option>
                    <?php foreach ($jobCategories as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat); ?>" <?php echo ($categoryFilter === $cat) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="filter-group">
                <label for="sort">Sort Date:</label>
                <select name="sort" id="sort">
                    <option value="DESC" <?php echo ($sortOrder === 'DESC') ? 'selected' : ''; ?>>Newest First (DESC)</option>
                    <option value="ASC" <?php echo ($sortOrder === 'ASC') ? 'selected' : ''; ?>>Oldest First (ASC)</option>
                </select>
            </div>

            <button type="submit" class="filter-btn">Apply Filter</button>
            <a href="admin_dashboard.php?tab=applications" class="reset-btn">Reset</a>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact</th>
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
                            <td><?= htmlspecialchars($app['contact']) ?></td>
                            <td><?= htmlspecialchars($app['category']) ?></td>
                            <td><?= htmlspecialchars($app['created_at']) ?></td>
                            <td>
                                <a href="uploads/<?= rawurlencode(basename($app['cv_filename'])) ?>" target="_blank" rel="noopener" style="color: #007bff; text-decoration: none; font-weight: bold;">
                                    📄 View CV (PDF)
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: #777;">No applications found in the database.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    <?php else: ?>
        <!-- ================= VACANCY SUBMISSIONS TAB ================= -->
        <form method="GET" action="admin_dashboard.php" class="filter-bar">
            <input type="hidden" name="tab" value="vacancies">

            <div class="filter-group">
                <label for="sort">Sort Date:</label>
                <select name="sort" id="sort">
                    <option value="DESC" <?php echo ($sortOrder === 'DESC') ? 'selected' : ''; ?>>Newest First (DESC)</option>
                    <option value="ASC" <?php echo ($sortOrder === 'ASC') ? 'selected' : ''; ?>>Oldest First (ASC)</option>
                </select>
            </div>

            <button type="submit" class="filter-btn">Apply Sort</button>
            <a href="admin_dashboard.php?tab=vacancies" class="reset-btn">Reset</a>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name / Employer</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Submitted Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($vacancies)): ?>
                    <?php foreach ($vacancies as $vac): ?>
                        <tr>
                            <td><?= htmlspecialchars($vac['id']) ?></td>
                            <td><?= htmlspecialchars($vac['fullname']) ?></td>
                            <td><?= htmlspecialchars($vac['email']) ?></td>
                            <td><?= htmlspecialchars($vac['contact']) ?></td>
                            <td><?= htmlspecialchars($vac['created_at']) ?></td>
                            <td>
                                <a href="uploads/<?= rawurlencode(basename($vac['jd_filename'])) ?>" target="_blank" rel="noopener" style="color: #28a745; text-decoration: none; font-weight: bold;">
                                    💼 View JD (PDF)
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: #777;">No job vacancy submissions found in the database.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    <?php endif; ?>

</div>

</body>
</html>
