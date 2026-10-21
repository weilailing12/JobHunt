<?php
// Include header
include 'header.php';

// Initialize variables to prevent intelephense undefined warnings
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = htmlspecialchars($_POST['name'] ?? '');
    $email    = htmlspecialchars($_POST['email'] ?? '');
    $contact  = htmlspecialchars($_POST['contact'] ?? '');
    $category = htmlspecialchars($_POST['job_category'] ?? '');

    // File upload handling for CV
    if (isset($_FILES['cv_file']) && $_FILES['cv_file']['error'] == 0) {
        $fileName = $_FILES['cv_file']['name'];
    }

    $formSubmitted = true;
}
?>

<!-- Main Container for Apply Job Page -->
<div style="max-width: 700px; margin: 40px auto; padding: 0 20px; font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <!-- Page Title -->
    <section style="text-align: center; margin-bottom: 30px;">
        <h1 style="font-size: 32px; color: #111; margin-bottom: 10px;">Apply A Job</h1>
        <p style="font-size: 15px; color: #007bff; font-weight: bold;">Submit your details and CV to explore career opportunities with Job Hunt.</p>
    </section>

    <?php if ($formSubmitted): ?>
        <!-- Success Alert Banner -->
        <div style="background-color: #d4edda; color: #155724; padding: 15px 20px; border-radius: 8px; border: 1px solid #c3e6cb; margin-bottom: 30px; text-align: center; font-size: 15px;">
            <strong>Thank you, <?php echo $name; ?>!</strong> Your application for <strong><?php echo $category; ?></strong> has been submitted successfully. Our customer service team will contact you shortly.
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
                <input type="text" name="name" required placeholder="Enter your full name" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
            </div>

            <!-- Email Address -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px;">
                    Email Address <span style="color: red;">*</span>
                </label>
                <input type="email" name="email" required placeholder="name@company.com" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
            </div>

            <!-- Contact Number -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px;">
                    Contact Number <span style="color: red;">*</span>
                </label>
                <input type="tel" name="contact" required placeholder="e.g. +6012-345 6789" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
            </div>

            <!-- Job Category Dropdown -->
            <div style="margin-bottom: 25px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px;">
                    Job Category <span style="color: red;">*</span>
                </label>
                <select name="job_category" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box; background: #fff;">
                    <option value="" disabled <?php echo empty($selectedCategory) ? 'selected' : ''; ?>>-- Select a Job Category --</option>
                    <?php foreach ($jobCategories as $cat): ?>
                        <option value="<?php echo $cat; ?>" <?php echo (strcasecmp($selectedCategory, $cat) == 0) ? 'selected' : ''; ?>>
                            <?php echo $cat; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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
                *Our customer service will contact you shortly after received your submission.
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