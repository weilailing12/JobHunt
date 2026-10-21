<?php
// Include header
include 'header.php';
?>

<!-- Main Container for Home Page -->
<div style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <!-- 1. Hero Section with Gradient Background -->
    <section style="background: linear-gradient(135deg, #004085, #007bff); color: #ffffff; padding: 80px 20px; text-align: center;">
        <div style="max-width: 800px; margin: 0 auto;">
            <h1 style="font-size: 42px; margin-bottom: 20px; font-weight: bold;">HEADHUNTING & RECRUITMENT</h1>
            <p style="font-size: 18px; margin-bottom: 35px; opacity: 0.95; line-height: 1.6;">
                Job Hunt is a telant search company that provides jobs, executive search and recruitment services.
            </p>
            
            <!-- Action Buttons -->
            <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                <a href="apply_job.php" style="background: #ffffff; color: #007bff; padding: 14px 30px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: background 0.2s;" onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='#ffffff'">
                    Apply A Job
                </a>
                <a href="submit_vacancy.php" style="background: transparent; color: #ffffff; border: 2px solid #ffffff; padding: 14px 30px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 16px; transition: background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='transparent'">
                    Post a Job
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content Wrapper -->
    <div style="max-width: 1100px; margin: 60px auto; padding: 0 20px;">

        <!-- 2. Our Solutions Section (6 cards: 3 top, 3 bottom) -->
        <section style="margin-bottom: 70px;">
            <div style="text-align: center; max-width: 800px; margin: 0 auto 40px auto;">
                <h2 style="font-size: 32px; color: #111; margin-bottom: 15px;">Our Solutions</h2>
                <p style="font-size: 16px; color: #555; line-height: 1.6;">
                    We offer a 360 degree recruitment solution from filtering to payroll services. We’re here to relieve you of the hassles and technicalities of running a business so you can focus on what you do best.
                </p>
            </div>

            <!-- 3x2 Grid (3 above, 3 below) -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 25px; margin-bottom: 35px;">

                <!-- Solution 1 -->
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #007bff;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Executive Search & Selection</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Appropriate where the position needing to be filled is senior and the qualified candidates are few...</p>
                </div>

                <!-- Solution 2 -->
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #007bff;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Permanent Placement</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">At Job Hunt, we use a robust resume database to effectively source for the right candidates...</p>
                </div>

                <!-- Solution 3 -->
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #007bff;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Contract Outsourcing</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Outsourcing of manpower has become a common practice nowadays with project-based needs...</p>
                </div>

                <!-- Solution 4 -->
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #28a745;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Recruitment Process Outsourcing (RPO)</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Recruitment process is a critical function in any organization which includes sourcing and assessment...</p>
                </div>

                <!-- Solution 5 -->
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #28a745;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Payroll Administration</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Developed specifically for small to medium size businesses, Payroll Administration streamlines the payroll...</p>
                </div>

                <!-- Solution 6 -->
                <div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-top: 4px solid #28a745;">
                    <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 10px;">Career Day</h3>
                    <p style="font-size: 14px; color: #555; margin: 0; line-height: 1.6;">Appropriate when there are multiple vacancies needed to be filled within a short period of time...</p>
                </div>

            </div>

            <!-- Read More Button for Solutions -->
            <div style="text-align: center;">
                <a href="solutions.php" style="background: #007bff; color: #ffffff; padding: 12px 30px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 15px; display: inline-block; transition: background 0.2s;" onmouseover="this.style.background='#0056b3'" onmouseout="this.style.background='#007bff'">
                    Read More
                </a>
            </div>
        </section>

        <!-- 3. About Us Section -->
        <section style="background: #f8f9fa; padding: 50px; border-radius: 10px; border: 1px solid #eaeaea; margin-bottom: 70px;">
            <h2 style="font-size: 28px; color: #111; margin-top: 0; margin-bottom: 20px; text-align: center;">About Us</h2>
            <p style="font-size: 15px; color: #555; line-height: 1.8; margin-bottom: 25px; text-align: justify;">
                Job Hunt was founded in 2005. Our consultants possess a blend of professional search experience and industry expertise. Our highly personalized service is unrivalled and we are supported by first rate associates and technology. Our continuous investment in research & development ensures that our methodologies remain dynamic and relevant. Job …
            </p>
            <div style="text-align: center;">
                <a href="intro.php" style="background: #007bff; color: #ffffff; padding: 12px 30px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 15px; display: inline-block; transition: background 0.2s;" onmouseover="this.style.background='#0056b3'" onmouseout="this.style.background='#007bff'">
                    Read More
                </a>
            </div>
        </section>

        <!-- 4. Job Category Section (4x4 Grid with Grayscale-to-Color Hover Effect) -->
        <section style="margin-bottom: 50px;">
            <div style="text-align: center; margin-bottom: 40px;">
                <h2 style="font-size: 32px; color: #111; margin-bottom: 10px;">Job Category</h2>
                <p style="font-size: 16px; color: #666;">Explore opportunities tailored to your specialized expertise.</p>
            </div>

            <!-- 4x4 Responsive Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">

                <!-- Category 1: Sales and Marketing -->
                <a href="apply_job.php?category=Sales+and+Marketing" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                    <div style="height: 140px; overflow: hidden; background: #eee;">
                        <img src="assets/category-sales.jpg" alt="Sales and Marketing" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #666; font-size: 13px;">[Photo: Sales]</div>
                    </div>
                    <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222;">
                        Sales and Marketing
                    </div>
                </a>

                <!-- Category 2: Property and Construction -->
                <a href="apply_job.php?category=Property+and+Construction" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                    <div style="height: 140px; overflow: hidden; background: #eee;">
                        <img src="assets/category-property.jpg" alt="Property and Construction" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #666; font-size: 13px;">[Photo: Property]</div>
                    </div>
                    <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222;">
                        Property and Construction
                    </div>
                </a>

                <!-- Category 3: Oil and Gas -->
                <a href="apply_job.php?category=Oil+and+Gas" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                    <div style="height: 140px; overflow: hidden; background: #eee;">
                        <img src="assets/category-oil.jpg" alt="Oil and Gas" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #666; font-size: 13px;">[Photo: Oil & Gas]</div>
                    </div>
                    <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222;">
                        Oil and Gas
                    </div>
                </a>

                <!-- Category 4: Human Resources and Admin -->
                <a href="apply_job.php?category=Human+Resources+and+Admin" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                    <div style="height: 140px; overflow: hidden; background: #eee;">
                        <img src="assets/category-hr.jpg" alt="Human Resources and Admin" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #666; font-size: 13px;">[Photo: HR]</div>
                    </div>
                    <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222;">
                        Human Resources and Admin
                    </div>
                </a>

                <!-- Category 5: Finance -->
                <a href="apply_job.php?category=Finance" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                    <div style="height: 140px; overflow: hidden; background: #eee;">
                        <img src="assets/category-finance.jpg" alt="Finance" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #666; font-size: 13px;">[Photo: Finance]</div>
                    </div>
                    <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222;">
                        Finance
                    </div>
                </a>

                <!-- Category 6: Accounting -->
                <a href="apply_job.php?category=Accounting" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                    <div style="height: 140px; overflow: hidden; background: #eee;">
                        <img src="assets/category-accounting.jpg" alt="Accounting" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #666; font-size: 13px;">[Photo: Accounting]</div>
                    </div>
                    <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222;">
                        Accounting
                    </div>
                </a>

                <!-- Category 7: Business Support -->
                <a href="apply_job.php?category=Business+Support" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                    <div style="height: 140px; overflow: hidden; background: #eee;">
                        <img src="assets/category-business.jpg" alt="Business Support" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #666; font-size: 13px;">[Photo: Business Support]</div>
                    </div>
                    <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222;">
                        Business Support
                    </div>
                </a>

                <!-- Category 8: Information Technology -->
                <a href="apply_job.php?category=Information+Technology" style="text-decoration: none; color: inherit; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                    <div style="height: 140px; overflow: hidden; background: #eee;">
                        <img src="assets/category-it.jpg" alt="Information Technology" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #666; font-size: 13px;">[Photo: IT]</div>
                    </div>
                    <div style="padding: 15px; text-align: center; font-weight: bold; font-size: 15px; color: #222;">
                        Information Technology
                    </div>
                </a>

            </div>
        </section>

    </div>

</div>

<?php
// Include footer
include 'footer.php';
?>