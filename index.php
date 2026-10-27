<?php
// Include header
include 'header.php';
include 'views/home-content.php';
include 'footer.php';
return;
?>

<!-- Main Container for Home Page -->
<div style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <!-- 1. Full-Screen Viewport Hero Section (Occupies 100% height & width before scroll) -->
    <section style="width: 100%; min-height: calc(100vh - 71px); background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.55)), url('assets/index.jpg'); background-size: cover; background-position: center; color: #ffffff; display: flex; align-items: center; justify-content: center; text-align: center; padding: 40px 20px; box-sizing: border-box;">
        <div style="max-width: 850px; margin: 0 auto;">
            <h1 style="font-size: 48px; margin-bottom: 20px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">HEADHUNTING & RECRUITMENT</h1>
            <p style="font-size: 18px; margin-bottom: 35px; opacity: 0.95; line-height: 1.6;">
                Job Hunt is a telant search company that provides jobs, executive search and recruitment services.
            </p>
            
            <!-- Action Buttons -->
            <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                <a href="apply_job.php" style="background: #1b365d; color: #ffffff; padding: 14px 32px; border-radius: 4px; text-decoration: none; font-weight: bold; font-size: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); transition: background 0.2s;" onmouseover="this.style.background='#142846'" onmouseout="this.style.background='#1b365d'">
                    ✏️ APPLY A JOB
                </a>
                <a href="submit_vacancy.php" style="background: #ffffff; color: #1b365d; padding: 14px 32px; border-radius: 4px; text-decoration: none; font-weight: bold; font-size: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); transition: background 0.2s;" onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='#ffffff'">
                    POST A JOB
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content Wrapper (Appears ONLY when scrolling down) -->
    <div style="max-width: 1200px; margin: 60px auto; padding: 0 20px;">

        <!-- 2. Our Solutions Section -->
        <section style="margin-bottom: 70px;">
            <div style="text-align: center; max-width: 800px; margin: 0 auto 40px auto;">
                <h2 style="font-size: 32px; color: #111; margin-bottom: 15px;">Our Solutions</h2>
                <p style="font-size: 16px; color: #555; line-height: 1.6;">
                    We offer a 360 degree recruitment solution from filtering to payroll services. We’re here to relieve you of the hassles and technicalities of running a business so you can focus on what you do best.
                </p>
            </div>

            <!-- 3x2 Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 25px; margin-bottom: 35px;">
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #007bff;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Executive Search & Selection</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Appropriate where the position needing to be filled is senior and the qualified candidates are few...</p>
                </div>
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #007bff;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Permanent Placement</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">At Job Hunt, we use a robust resume database to effectively source for the right candidates...</p>
                </div>
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #007bff;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Contract Outsourcing</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Outsourcing of manpower has become a common practice nowadays with project-based needs...</p>
                </div>
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #28a745;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Recruitment Process Outsourcing (RPO)</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Recruitment process is a critical function in any organization which includes sourcing and assessment...</p>
                </div>
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #28a745;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Payroll Administration</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Developed specifically for small to medium size businesses, Payroll Administration streamlines the payroll...</p>
                </div>
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #28a745;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Career Day</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Appropriate when there are multiple vacancies needed to be filled within a short period of time...</p>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="solutions.php" style="background: #007bff; color: #ffffff; padding: 12px 30px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 15px; display: inline-block;">Read More</a>
            </div>
        </section>

        <!-- 3. About Us Section -->
        <section style="background: #f8f9fa; padding: 50px; border-radius: 10px; border: 1px solid #eaeaea; margin-bottom: 40px;">
            <h2 style="font-size: 28px; color: #111; margin-top: 0; margin-bottom: 20px; text-align: center;">About Us</h2>
            <p style="font-size: 15px; color: #555; line-height: 1.8; margin-bottom: 25px; text-align: justify;">
                Job Hunt was founded in 2005. Our consultants possess a blend of professional search experience and industry expertise. Our highly personalized service is unrivalled and we are supported by first rate associates and technology. Our continuous investment in research & development ensures that our methodologies remain dynamic and relevant. Job …
            </p>
            <div style="text-align: center;">
                <a href="intro.php" style="background: #007bff; color: #ffffff; padding: 12px 30px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 15px; display: inline-block;">Read More</a>
            </div>
        </section>

        <!-- 4. Why Choose Us Section -->
        <section style="background: #ffffff; padding: 50px; border-radius: 10px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); margin-bottom: 70px;">
            <h2 style="font-size: 28px; color: #111; margin-top: 0; margin-bottom: 20px; text-align: center;">Why Choose Us?</h2>
            <p style="font-size: 15px; color: #555; line-height: 1.8; margin-bottom: 20px; text-align: justify;">
                Our consistently successful recruitment experience has enabled us to develop a well-defined process that can dramatically enhance the effectiveness of each assignment. Each step is clearly focused on identifying, attracting and evaluating outstanding candidates, so that you see only qualified candidates with real potential and thereby positively impact the overall competency and success of the entire organization.
            </p>
            <p style="font-size: 15px; color: #555; line-height: 1.8; margin: 0; text-align: justify;">
                We routinely communicate with clients by phone, e-mail and personal meetings on a weekly basis to ensure continual client awareness of the progress of the project.
            </p>
        </section>

        <!-- 5. Job Category Section -->
        <section style="margin-bottom: 50px;">
            <div style="text-align: center; margin-bottom: 40px;">
                <h2 style="font-size: 32px; color: #111; margin-bottom: 10px;">Job Category</h2>
                <p style="font-size: 16px; color: #666;">Explore opportunities tailored to your specialized expertise.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
                <?php 
                $categories = [
                    ["Sales and Marketing", "assets/sales-marketing.jpg"],
                    ["Property and Construction", "assets/property.jpg"],
                    ["Oil and Gas", "assets/oil-gas.jpg"],
                    ["Human Resources and Admin", "assets/hr1.jpg"],
                    ["Finance", "assets/finance.jpg"],
                    ["Accounting", "assets/accounting.jpg"],
                    ["Business Support", "assets/business-support.jpg"],
                    ["Information Technology", "assets/it.jpg"]
                ];

                foreach($categories as $cat) {
                    $catParam = urlencode($cat[0]);
                    echo '
                    <a href="apply_job.php?category='.$catParam.'" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                        <div style="padding: 15px; background: #fdfdfd; height: 160px; display: flex; align-items: center; justify-content: center;">
                            <img src="'.$cat[1].'" alt="'.$cat[0].'" style="max-width: 100%; max-height: 100%; object-fit: cover; border-radius: 6px; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter=\'grayscale(0%)\'" onmouseout="this.style.filter=\'grayscale(100%)\'">
                        </div>
                        <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222; border-top: 1px solid #f1f5f9;">
                            '.$cat[0].'
                        </div>
                    </a>';
                }
                ?>
            </div>
        </section>

    </div>

</div>

<?php
// Include footer
include 'footer.php';
?>
