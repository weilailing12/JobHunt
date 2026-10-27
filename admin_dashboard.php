<?php
declare(strict_types=1);

require __DIR__ . '/admin_bootstrap.php';
requireAdminLogin();
require __DIR__ . '/database.php';

$jobCategories = [
    'Sales and Marketing', 'Property and Construction', 'Oil and Gas',
    'Human Resources and Admin', 'Finance', 'Accounting',
    'Business Support', 'Information Technology',
];
$applicationStatuses = ['New', 'Reviewed', 'Shortlisted', 'Rejected'];
$vacancyStatuses = ['New', 'Reviewed', 'In Progress', 'Closed'];
$allowedTabs = ['applications', 'vacancies'];
$stringValue = static fn($value, string $default = ''): string => is_string($value) ? $value : $default;

$requestedTab = $stringValue($_GET['tab'] ?? null);
$requestedCategory = $stringValue($_GET['category'] ?? null);
$activeTab = in_array($requestedTab, $allowedTabs, true) ? $requestedTab : 'applications';
$categoryFilter = in_array($requestedCategory, $jobCategories, true) ? $requestedCategory : '';
$sortOrder = strtoupper($stringValue($_GET['sort'] ?? null, 'DESC')) === 'ASC' ? 'ASC' : 'DESC';
$search = trim(mb_substr($stringValue($_GET['search'] ?? null), 0, 100));
$requestedPage = filter_var($_GET['page'] ?? null, FILTER_VALIDATE_INT);
$page = max(1, $requestedPage ?: 1);
$perPage = 20;
$loadError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!adminVerifyCsrf($_POST['csrf_token'] ?? null)) {
        http_response_code(403);
        exit('Your session expired. Please return to the dashboard and try again.');
    }

    $entity = $stringValue($_POST['entity'] ?? null);
    $recordId = filter_var($_POST['record_id'] ?? null, FILTER_VALIDATE_INT);
    $newStatus = $stringValue($_POST['status'] ?? null);
    $statusConfig = [
        'application' => ['table' => 'job_applications', 'statuses' => $applicationStatuses],
        'vacancy' => ['table' => 'job_vacancies', 'statuses' => $vacancyStatuses],
    ];

    if (!$recordId || !isset($statusConfig[$entity]) || !in_array($newStatus, $statusConfig[$entity]['statuses'], true)) {
        http_response_code(400);
        exit('Invalid status update.');
    }

    try {
        $table = $statusConfig[$entity]['table'];
        $stmt = $pdo->prepare("UPDATE {$table} SET status = ? WHERE id = ?");
        $stmt->execute([$newStatus, $recordId]);
        $_SESSION['admin_flash'] = 'Status updated successfully.';
    } catch (PDOException $e) {
        error_log('Admin status update failed: ' . $e->getMessage());
        $_SESSION['admin_flash_error'] = 'The status could not be updated. Please try again.';
    }

    $postedReturnTab = $stringValue($_POST['return_tab'] ?? null);
    $postedReturnCategory = $stringValue($_POST['return_category'] ?? null);
    $returnTab = in_array($postedReturnTab, $allowedTabs, true) ? $postedReturnTab : 'applications';
    $returnQuery = [
        'tab' => $returnTab,
        'search' => mb_substr(trim($stringValue($_POST['return_search'] ?? null)), 0, 100),
        'category' => in_array($postedReturnCategory, $jobCategories, true) ? $postedReturnCategory : '',
        'sort' => strtoupper($stringValue($_POST['return_sort'] ?? null, 'DESC')) === 'ASC' ? 'ASC' : 'DESC',
        'page' => max(1, filter_var($_POST['return_page'] ?? null, FILTER_VALIDATE_INT) ?: 1),
    ];
    header('Location: admin_dashboard.php?' . http_build_query($returnQuery));
    exit;
}

$flash = $_SESSION['admin_flash'] ?? '';
$flashError = $_SESSION['admin_flash_error'] ?? '';
unset($_SESSION['admin_flash'], $_SESSION['admin_flash_error']);

$stats = ['applications' => 0, 'new_applications' => 0, 'vacancies' => 0];
$rows = [];
$totalRows = 0;

try {
    $stats['applications'] = (int) $pdo->query('SELECT COUNT(*) FROM job_applications')->fetchColumn();
    $stats['new_applications'] = (int) $pdo->query("SELECT COUNT(*) FROM job_applications WHERE status = 'New'")->fetchColumn();
    $stats['vacancies'] = (int) $pdo->query('SELECT COUNT(*) FROM job_vacancies')->fetchColumn();

    $where = [];
    $params = [];
    if ($activeTab === 'applications' && $categoryFilter !== '') {
        $where[] = 'category = ?';
        $params[] = $categoryFilter;
    }
    if ($search !== '') {
        $where[] = '(fullname LIKE ? OR email LIKE ? OR contact LIKE ?)';
        $term = '%' . $search . '%';
        array_push($params, $term, $term, $term);
    }
    $whereSql = $where ? ' WHERE ' . implode(' AND ', $where) : '';
    $table = $activeTab === 'vacancies' ? 'job_vacancies' : 'job_applications';

    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM {$table}{$whereSql}");
    $countStmt->execute($params);
    $totalRows = (int) $countStmt->fetchColumn();
    $totalPages = max(1, (int) ceil($totalRows / $perPage));
    $page = min($page, $totalPages);
    $offset = ($page - 1) * $perPage;

    if ($activeTab === 'vacancies') {
        $sql = "SELECT id, fullname, email, contact, jd_filename, status, created_at FROM job_vacancies{$whereSql} ORDER BY created_at {$sortOrder} LIMIT {$perPage} OFFSET {$offset}";
    } else {
        $sql = "SELECT id, fullname, email, contact, category, cv_filename, status, created_at FROM job_applications{$whereSql} ORDER BY created_at {$sortOrder} LIMIT {$perPage} OFFSET {$offset}";
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log('Admin dashboard load failed: ' . $e->getMessage());
    $loadError = 'Dashboard data could not be loaded. Please refresh or check the database connection.';
    $totalPages = 1;
}

$queryBase = ['tab' => $activeTab, 'search' => $search, 'category' => $categoryFilter, 'sort' => $sortOrder];
$urlForPage = static fn(int $targetPage): string => 'admin_dashboard.php?' . http_build_query($queryBase + ['page' => $targetPage]);
$firstShown = $totalRows > 0 ? (($page - 1) * $perPage) + 1 : 0;
$lastShown = min($page * $perPage, $totalRows);
$currentStatuses = $activeTab === 'vacancies' ? $vacancyStatuses : $applicationStatuses;
$entityName = $activeTab === 'vacancies' ? 'vacancy' : 'application';

function adminDate(string $value): string
{
    $timestamp = strtotime($value);
    return $timestamp ? date('d M Y, g:i a', $timestamp) : $value;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Job Hunt</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<main class="admin-shell">
    <header class="dashboard-header">
        <div>
            <h1>HR Admin Dashboard</h1>
            <p>Signed in as <strong><?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin') ?></strong> · Manage applications and vacancy submissions.</p>
        </div>
        <form class="logout-form" action="logout.php" method="post">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(adminCsrfToken()) ?>">
            <button class="btn btn-danger" type="submit">Log out</button>
        </form>
    </header>

    <section class="stats-grid" aria-label="Dashboard summary">
        <article class="stat-card"><span>Total applications</span><strong><?= $stats['applications'] ?></strong></article>
        <article class="stat-card"><span>New applications</span><strong><?= $stats['new_applications'] ?></strong></article>
        <article class="stat-card"><span>Vacancy submissions</span><strong><?= $stats['vacancies'] ?></strong></article>
    </section>

    <section class="panel">
        <nav class="tab-container" aria-label="Dashboard sections">
            <a href="admin_dashboard.php?tab=applications" class="tab-link <?= $activeTab === 'applications' ? 'active' : '' ?>" <?= $activeTab === 'applications' ? 'aria-current="page"' : '' ?>>Job Applications</a>
            <a href="admin_dashboard.php?tab=vacancies" class="tab-link <?= $activeTab === 'vacancies' ? 'active' : '' ?>" <?= $activeTab === 'vacancies' ? 'aria-current="page"' : '' ?>>Vacancy Submissions</a>
        </nav>

        <?php if ($loadError): ?><div class="notice notice-error" role="alert"><?= htmlspecialchars($loadError) ?></div><?php endif; ?>
        <?php if ($flash): ?><div class="notice notice-success" role="status"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
        <?php if ($flashError): ?><div class="notice notice-error" role="alert"><?= htmlspecialchars($flashError) ?></div><?php endif; ?>

        <form method="get" action="admin_dashboard.php" class="filter-bar">
            <input type="hidden" name="tab" value="<?= htmlspecialchars($activeTab) ?>">
            <div class="filter-group search">
                <label for="search">Search name, email or contact</label>
                <input type="search" name="search" id="search" value="<?= htmlspecialchars($search) ?>" placeholder="Start typing…">
            </div>
            <?php if ($activeTab === 'applications'): ?>
                <div class="filter-group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        <option value="">All categories</option>
                        <?php foreach ($jobCategories as $category): ?>
                            <option value="<?= htmlspecialchars($category) ?>" <?= $categoryFilter === $category ? 'selected' : '' ?>><?= htmlspecialchars($category) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
            <div class="filter-group">
                <label for="sort">Submission date</label>
                <select name="sort" id="sort">
                    <option value="DESC" <?= $sortOrder === 'DESC' ? 'selected' : '' ?>>Newest first</option>
                    <option value="ASC" <?= $sortOrder === 'ASC' ? 'selected' : '' ?>>Oldest first</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Apply filters</button>
            <a class="btn btn-secondary" href="admin_dashboard.php?tab=<?= htmlspecialchars($activeTab) ?>">Reset</a>
        </form>

        <div class="table-wrapper">
            <table>
                <thead><tr>
                    <th>ID</th><th>Name</th><th>Contact</th>
                    <?php if ($activeTab === 'applications'): ?><th>Category</th><?php endif; ?>
                    <th>Submitted</th><th>Status</th><th>Document</th>
                </tr></thead>
                <tbody>
                <?php if (!$rows): ?>
                    <tr><td class="empty-row" colspan="<?= $activeTab === 'applications' ? 7 : 6 ?>">No matching submissions found.</td></tr>
                <?php else: foreach ($rows as $row): ?>
                    <tr>
                        <td><?= (int) $row['id'] ?></td>
                        <td><strong><?= htmlspecialchars($row['fullname']) ?></strong></td>
                        <td><div class="contact-links"><a href="mailto:<?= htmlspecialchars($row['email']) ?>"><?= htmlspecialchars($row['email']) ?></a><a href="tel:<?= htmlspecialchars($row['contact']) ?>"><?= htmlspecialchars($row['contact']) ?></a></div></td>
                        <?php if ($activeTab === 'applications'): ?><td><?= htmlspecialchars($row['category']) ?></td><?php endif; ?>
                        <td><?= htmlspecialchars(adminDate($row['created_at'])) ?></td>
                        <td>
                            <form class="status-form" method="post" action="admin_dashboard.php">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(adminCsrfToken()) ?>">
                                <input type="hidden" name="entity" value="<?= $entityName ?>">
                                <input type="hidden" name="record_id" value="<?= (int) $row['id'] ?>">
                                <input type="hidden" name="return_tab" value="<?= htmlspecialchars($activeTab) ?>">
                                <input type="hidden" name="return_search" value="<?= htmlspecialchars($search) ?>">
                                <input type="hidden" name="return_category" value="<?= htmlspecialchars($categoryFilter) ?>">
                                <input type="hidden" name="return_sort" value="<?= htmlspecialchars($sortOrder) ?>">
                                <input type="hidden" name="return_page" value="<?= $page ?>">
                                <select class="status-select" name="status" aria-label="Status for <?= htmlspecialchars($row['fullname']) ?>">
                                    <?php foreach ($currentStatuses as $status): ?><option value="<?= htmlspecialchars($status) ?>" <?= ($row['status'] ?? 'New') === $status ? 'selected' : '' ?>><?= htmlspecialchars($status) ?></option><?php endforeach; ?>
                                </select>
                                <button class="btn btn-primary btn-small" type="submit">Save</button>
                            </form>
                        </td>
                        <td><a class="document-link" href="admin_download.php?type=<?= $entityName ?>&amp;id=<?= (int) $row['id'] ?>" target="_blank" rel="noopener"><?= $activeTab === 'applications' ? 'View CV' : 'View JD' ?></a></td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <p>Showing <?= $firstShown ?>–<?= $lastShown ?> of <?= $totalRows ?> records</p>
            <div class="pagination-links">
                <?php if ($page > 1): ?><a class="btn btn-secondary btn-small" href="<?= htmlspecialchars($urlForPage($page - 1)) ?>">Previous</a><?php endif; ?>
                <?php if ($page < $totalPages): ?><a class="btn btn-secondary btn-small" href="<?= htmlspecialchars($urlForPage($page + 1)) ?>">Next</a><?php endif; ?>
            </div>
        </div>
    </section>
</main>
</body>
</html>
