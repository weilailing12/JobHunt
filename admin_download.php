<?php
declare(strict_types=1);

require __DIR__ . '/admin_bootstrap.php';
requireAdminLogin();
require __DIR__ . '/database.php';

$type = is_string($_GET['type'] ?? null) ? $_GET['type'] : '';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$config = [
    'application' => ['table' => 'job_applications', 'column' => 'cv_filename', 'label' => 'candidate-cv'],
    'vacancy' => ['table' => 'job_vacancies', 'column' => 'jd_filename', 'label' => 'job-description'],
];

if (!$id || !isset($config[$type])) {
    http_response_code(400);
    exit('Invalid document request.');
}

$document = $config[$type];
$stmt = $pdo->prepare("SELECT {$document['column']} AS filename FROM {$document['table']} WHERE id = ? LIMIT 1");
$stmt->execute([$id]);
$row = $stmt->fetch();

if (!$row) {
    http_response_code(404);
    exit('Document not found.');
}

$filename = basename((string) $row['filename']);
$uploadDirectory = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'uploads');
$filePath = $uploadDirectory ? realpath($uploadDirectory . DIRECTORY_SEPARATOR . $filename) : false;

if (!$filePath || !$uploadDirectory || !str_starts_with($filePath, $uploadDirectory . DIRECTORY_SEPARATOR) || !is_file($filePath)) {
    http_response_code(404);
    exit('Document not found.');
}

$mimeType = (new finfo(FILEINFO_MIME_TYPE))->file($filePath);
if ($mimeType !== 'application/pdf') {
    http_response_code(415);
    exit('Unsupported document type.');
}

header('Content-Type: application/pdf');
header('Content-Length: ' . filesize($filePath));
header('Content-Disposition: inline; filename="' . $document['label'] . '-' . $id . '.pdf"');
header('Cache-Control: private, no-store, max-age=0');
readfile($filePath);
exit;
