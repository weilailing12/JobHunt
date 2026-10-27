<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$pageTitles = [
    'index.php' => 'Executive Search & Recruitment',
    'intro.php' => 'About Us',
    'missionvision.php' => 'Mission & Vision',
    'esd.php' => 'Expatriate Services Division',
    'pvp.php' => 'Professional Visit Pass',
    'hr-outsourcing.php' => 'HR Outsourcing Services',
    'solutions.php' => 'Our Solutions',
    'methodology.php' => 'Our Search Methodology',
    'contact.php' => 'Contact Us',
    'apply_job.php' => 'Apply for a Job',
    'submit_vacancy.php' => 'Post a Job',
];
$aboutPages = ['intro.php', 'missionvision.php'];
$servicePages = ['esd.php', 'pvp.php', 'hr-outsourcing.php'];

if (!function_exists('renderPageHero')) {
    function renderPageHero(string $eyebrow, string $title, string $description): void
    {
        echo '<section class="page-hero"><div class="container section-heading">';
        echo '<span class="eyebrow">' . htmlspecialchars($eyebrow) . '</span>';
        echo '<h1>' . htmlspecialchars($title) . '</h1>';
        echo '<p>' . htmlspecialchars($description) . '</p>';
        echo '</div></section>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitles[$currentPage] ?? 'HR Consulting & Recruitment') ?> | Job Hunt</title>
    <style>
        /* Global Header Reset & Styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Header Container */
        .site-header {
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Logo Styling */
        .logo a {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .logo img {
            max-height: 40px;
            object-fit: contain;
        }

        /* Navigation Menu */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
            list-style: none;
        }

        .nav-menu li {
            position: relative;
        }

        .nav-menu a {
            text-decoration: none;
            color: #444;
            font-size: 15px;
            font-weight: 500;
            padding: 8px 12px;
            display: block;
            transition: color 0.2s ease;
        }

        .nav-menu a:hover {
            color: #007bff;
        }

        /* Dropdown Styling */
        .dropdown .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #ffffff;
            min-width: 240px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 6px;
            border: 1px solid #eaeaea;
            overflow: hidden;
            z-index: 10;
        }

        .dropdown .dropdown-content a {
            padding: 12px 16px;
            color: #444;
            white-space: nowrap;
        }

        .dropdown .dropdown-content a:hover {
            background-color: #f1f5f9;
            color: #007bff;
        }

        /* Show dropdown on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Action Buttons */
        .header-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-post {
            background-color: #ffffff;
            color: #007bff;
            border: 1px solid #007bff;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.2s ease;
        }
        .btn-post:hover {
            background-color: #f0f7ff;
        }

        .btn-apply {
            background-color: #007bff;
            color: #ffffff;
            border: 1px solid #007bff;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }
        .btn-apply:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="assets/css/site.css">
    <script src="assets/js/site.js" defer></script>
</head>
<body>

    <a class="skip-link" href="#main-content">Skip to content</a>

    <header class="site-header">
        <div class="header-container">
            
            <!-- Left: Company Logo -->
            <div class="logo">
                <a class="brand" href="index.php" aria-label="Job Hunt home">
                    <img src="assets/JobHunt logo.png" alt="Job Hunt Logo">
                </a>
            </div>

            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
                <span></span><span></span><span></span>
                <span class="sr-only">Open navigation</span>
            </button>

            <!-- Center / Right: Navigation Links & Dropdowns -->
            <nav id="primary-navigation" class="primary-navigation" aria-label="Primary navigation">
                <ul class="nav-menu">
                    
                    <!-- About Us Dropdown -->
                    <li class="dropdown <?= in_array($currentPage, $aboutPages, true) ? 'is-active' : '' ?>">
                        <button class="dropdown-toggle" type="button" aria-expanded="false">About Us <span aria-hidden="true">⌄</span></button>
                        <div class="dropdown-content">
                            <a href="intro.php" <?= $currentPage === 'intro.php' ? 'aria-current="page"' : '' ?>>Introduction</a>
                            <a href="missionvision.php" <?= $currentPage === 'missionvision.php' ? 'aria-current="page"' : '' ?>>Mission & Vision</a>
                        </div>
                    </li>

                    <!-- Services Dropdown -->
                    <li class="dropdown <?= in_array($currentPage, $servicePages, true) ? 'is-active' : '' ?>">
                        <button class="dropdown-toggle" type="button" aria-expanded="false">Services <span aria-hidden="true">⌄</span></button>
                        <div class="dropdown-content">
                            <a href="esd.php" <?= $currentPage === 'esd.php' ? 'aria-current="page"' : '' ?>>Expatriate Services Division (ESD)</a>
                            <a href="pvp.php" <?= $currentPage === 'pvp.php' ? 'aria-current="page"' : '' ?>>Professional Visit Pass (PVP)</a>
                            <a href="hr-outsourcing.php" <?= $currentPage === 'hr-outsourcing.php' ? 'aria-current="page"' : '' ?>>HR Outsourcing Services</a>
                        </div>
                    </li>

                    <li><a href="solutions.php" <?= $currentPage === 'solutions.php' ? 'aria-current="page"' : '' ?>>Solutions</a></li>
                    <li><a href="methodology.php" <?= $currentPage === 'methodology.php' ? 'aria-current="page"' : '' ?>>Methodology</a></li>
                    <li><a href="contact.php" <?= $currentPage === 'contact.php' ? 'aria-current="page"' : '' ?>>Contact</a></li>
                </ul>
            </nav>

            <!-- Rightmost: CTA Buttons -->
            <div class="header-actions">
                <a href="submit_vacancy.php" class="button button-outline">Post a Job</a>
                <a href="apply_job.php" class="button button-primary">Apply for a Job</a>
            </div>

        </div>
    </header>

    <main id="main-content">
