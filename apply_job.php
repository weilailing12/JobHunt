<?php
// Include database connection before any page output
include 'database.php';

// Initialize variables
$formSubmitted = false;
$name = '';
$category = '';

// Get selected category from URL parameter (e.g. apply_job.php?category=Finance)
$selectedCategory = $_GET['category'] ?? '';

// Array of official Job Categories
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

if (!in_array($selectedCategory, $jobCategories, true)) {
    $selectedCategory = '';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $contact  = trim($_POST['contact'] ?? '');
    $category = trim($_POST['job_category'] ?? '');
    $file     = $_FILES['cv_file'] ?? null;

    if ($name === '' || strlen($name) > 100 || strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        $contact === '' || strlen($contact) > 30 || !in_array($category, $jobCategories, true)) {
        $dbError = 'Please check your details and try again.';
    } elseif (!$file || $file['error'] !== UPLOAD_ERR_OK || $file['size'] > 5 * 1024 * 1024) {
        $dbError = 'Please upload a PDF CV smaller than 5 MB.';
    } else {
        $mimeType = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
        if ($mimeType !== 'application/pdf') {
            $dbError = 'Only PDF files are accepted.';
        } else {
            $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $cvFileName = 'cv_' . bin2hex(random_bytes(16)) . '.pdf';
            $targetFilePath = $uploadDir . DIRECTORY_SEPARATOR . $cvFileName;
            if (!move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                $dbError = 'The CV could not be uploaded. Please try again.';
            } else {
                try {
                    $stmt = $pdo->prepare("INSERT INTO job_applications (fullname, email, contact, category, cv_filename) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$name, $email, $contact, $category, $cvFileName]);
                    $formSubmitted = true;
                } catch (PDOException $e) {
                    @unlink($targetFilePath);
                    $dbError = 'Your application could not be saved. Please try again later.';
                }
            }
        }
    }
}

include 'header.php';
renderPageHero('For candidates', 'Apply for a Job', 'Submit your details and CV to explore opportunities with Job Hunt.');
?>

<!-- Main Container for Apply Job Page -->
<div style="max-width: 700px; margin: 40px auto; padding: 0 20px; font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <?php if ($formSubmitted): ?>
        <!-- JavaScript Alert Box with OK button -->
        <script>
            alert("Thank you, <?php echo addslashes($name); ?>! Your application for <?php echo addslashes($category); ?> has been submitted successfully. Our customer service team will contact you shortly.");
            window.location.href = "index.php"; // Redirects to homepage after clicking OK
        </script>
    <?php elseif (isset($dbError)): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 8px; border: 1px solid #f5c6cb; margin-bottom: 30px; text-align: center; font-size: 15px;">
            <?php echo $dbError; ?>
        </div>
    <?php endif; ?>

    <!-- Form Container Card -->
    <div style="background: #ffffff; padding: 35px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border: 1px solid #eaeaea;">
        
        <form action="apply_job.php" method="POST" enctype="multipart/form-data">

            <h3 style="font-size: 18px; color: #007bff; margin-top: 0; margin-bottom: 20px; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px;">
                Personal Information
            </h3>

            <!-- Name -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px;">
                    Name <span style="color: red;">*</span>
                </label>
                <input type="text" name="name" maxlength="100" required placeholder="Enter your full name" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
            </div>

            <!-- Email Address -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px;">
                    Email Address <span style="color: red;">*</span>
                </label>
                <input type="email" name="email" maxlength="100" required placeholder="name@company.com" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
            </div>

            <!-- Contact Number -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px;">
                    Contact Number <span style="color: red;">*</span>
                </label>
                <input type="tel" name="contact" maxlength="30" required placeholder="e.g. +6012-345 6789" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
            </div>

            <!-- Job Category Dropdown (Locked if selected from homepage) -->
            <div style="margin-bottom: 25px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px;">
                    Job Category <span style="color: red;">*</span>
                </label>
                
                <?php if (!empty($selectedCategory)): ?>
                    <!-- If a category was chosen from the homepage, show it as locked/disabled, but pass the value using a hidden input -->
                    <select disabled style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box; background: #e9ecef; color: #495057; cursor: not-allowed;">
                        <option value="<?php echo htmlspecialchars($selectedCategory); ?>" selected>
                            <?php echo htmlspecialchars($selectedCategory); ?>
                        </option>
                    </select>
                    <!-- Hidden input so the value is still submitted via POST to your database -->
                    <input type="hidden" name="job_category" value="<?php echo htmlspecialchars($selectedCategory); ?>">
                
                <?php else: ?>
                    <!-- If they came directly to the page without picking a category, show the normal selectable dropdown -->
                    <select name="job_category" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box; background: #fff;">
                        <option value="" disabled selected>-- Select a Job Category --</option>
                        <?php foreach ($jobCategories as $cat): ?>
                            <option value="<?php echo $cat; ?>">
                                <?php echo $cat; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>

            <!-- Submit Your CV -->
            <div style="margin-bottom: 25px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 4px;">
                    Submit Your CV <span style="font-weight: normal; color: #666;">(Please submit your CV in PDF file)</span> <span style="color: red;">*</span>
                </label>
                <input type="file" name="cv_file" accept=".pdf" required style="width: 100%; padding: 10px; border: 1px dashed #007bff; border-radius: 6px; background: #f8f9fa; font-size: 14px; box-sizing: border-box; cursor: pointer;">
            </div>

            <!-- Customer Service Disclaimer Message -->
            <p style="font-size: 13px; color: #666; font-style: italic; margin-bottom: 25px;">
                *Our customer service team will contact you after receiving your submission.
            </p>

            <!-- Send Button -->
            <button type="submit" style="width: 100%; background: #007bff; color: #ffffff; padding: 14px; border: none; border-radius: 6px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background 0.2s;" onmouseover="this.style.background='#0056b3'" onmouseout="this.style.background='#007bff'">
                Send
            </button>

        </form>

    </div>

</div>

<?php
// Include footer
include 'footer.php';
?>
