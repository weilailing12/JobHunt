<?php
// Include header
include 'header.php';

// Initialize variables to prevent intelephense undefined warnings
$formSubmitted = false;
$name = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name'] ?? '');
    $email   = htmlspecialchars($_POST['email'] ?? '');
    $contact = htmlspecialchars($_POST['contact'] ?? '');
    
    // File upload handling for JD
    if (isset($_FILES['jd_file']) && $_FILES['jd_file']['error'] == 0) {
        $fileName = $_FILES['jd_file']['name'];
    }

    $formSubmitted = true;
}
?>

<!-- Main Container for Submit Vacancy Page -->
<div style="max-width: 700px; margin: 40px auto; padding: 0 20px; font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <!-- Page Title -->
    <section style="text-align: center; margin-bottom: 30px;">
        <h1 style="font-size: 32px; color: #111; margin-bottom: 10px;">Submit A Job</h1>
        <p style="font-size: 15px; color: #007bff; font-weight: bold;">Post your vacancy details and let us source the ideal candidate for you.</p>
    </section>

    <?php if ($formSubmitted): ?>
        <!-- Success Alert Banner -->
        <div style="background-color: #d4edda; color: #155724; padding: 15px 20px; border-radius: 8px; border: 1px solid #c3e6cb; margin-bottom: 30px; text-align: center; font-size: 15px;">
            <strong>Thank you, <?php echo $name; ?>!</strong> Your job vacancy submission has been received. Our customer service team will contact you shortly.
        </div>
    <?php endif; ?>

    <!-- Form Container Card -->
    <div style="background: #ffffff; padding: 35px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border: 1px solid #eaeaea;">
        
        <form action="submit_vacancy.php" method="POST" enctype="multipart/form-data">

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
            <div style="margin-bottom: 25px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 6px;">
                    Contact Number <span style="color: red;">*</span>
                </label>
                <input type="tel" name="contact" required placeholder="e.g. +6012-345 6789" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
            </div>

            <!-- Submit your JD -->
            <div style="margin-bottom: 25px;">
                <label style="display: block; font-size: 14px; font-weight: bold; color: #444; margin-bottom: 4px;">
                    Submit your JD <span style="font-weight: normal; color: #666;">(Please submit your JD in PDF file)</span> <span style="color: red;">*</span>
                </label>
                <input type="file" name="jd_file" accept=".pdf" required style="width: 100%; padding: 10px; border: 1px dashed #007bff; border-radius: 6px; background: #f8f9fa; font-size: 14px; box-sizing: border-box; cursor: pointer;">
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