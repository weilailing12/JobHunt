<!-- Footer Section -->
    <footer style="background-color: #1a1a1a; color: #bbb; padding: 50px 20px 20px 20px; font-family: Arial, sans-serif; margin-top: 60px; border-top: 4px solid #007bff;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; gap: 40px; flex-wrap: wrap; padding-bottom: 40px; border-bottom: 1px solid #333;">
            
            <!-- Column 1: Logo & Company Description -->
            <div style="flex: 1; min-width: 250px;">
                <!-- Company Logo Slot -->
                <div style="margin-bottom: 15px;">
                    <a href="index.php" style="text-decoration: none; display: inline-block;">
                        <img src="assets/JobHunt logo.png" alt="Job Hunt Logo" style="max-height: 45px; object-fit: contain; display: block;" onerror="this.style.display='none'; document.getElementById('footer-fallback-logo').style.display='block';">
                        <span id="footer-fallback-logo" style="color: #ffffff; font-size: 22px; font-weight: bold; display: none;">Job Hunt</span>
                    </a>
                </div>
                <p style="font-size: 14px; line-height: 1.6; color: #aaa; margin: 0;">
                    We serve a broad base of organizations ranging from multinational corporations to small and medium size enterprises of all major business sectors.
                </p>
            </div>

            <!-- Column 2: Contact Information -->
            <div style="flex: 1; min-width: 280px;">
                <h4 style="color: #ffffff; font-size: 16px; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 0.5px;">Contact Us</h4>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8; color: #aaa;">
                    <!-- Clickable Address linking to Google Maps -->
                    <li style="margin-bottom: 8px;">
                        <strong>Address:</strong> 
                        <a href="https://www.google.com/maps/search/?api=1&query=Unit+10-3+Oval+Damansara+Jalan+Damansara+Taman+Tun+Dr+Ismail+60000+Kuala+Lumpur" target="_blank" style="color: #aaa; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#007bff'" onmouseout="this.style.color='#aaa'">
                            Unit 10-3, 10th Floor, Oval Damansara, Jalan Damansara, Taman Tun Dr Ismail, 60000 Kuala Lumpur, Malaysia
                        </a>
                    </li>
                    <!-- Clickable Contact No -->
                    <li style="margin-bottom: 6px;">
                        <strong>Contact No:</strong> 
                        <a href="tel:+60377318282" style="color: #007bff; text-decoration: none;">+603 7731 8282</a>
                    </li>
                    <!-- Clickable Fax -->
                    <li style="margin-bottom: 6px;">
                        <strong>Fax:</strong> 
                        <a href="tel:+60377338692" style="color: #007bff; text-decoration: none;">+603 7733 8692</a>
                    </li>
                    <!-- Clickable Emails -->
                    <li><strong>Email:</strong><br>
                        <a href="mailto:secretary@jobhunt.com.my" style="color: #007bff; text-decoration: none;">secretary@jobhunt.com.my</a><br>
                        <a href="mailto:secretary2@jobhunt.com.my" style="color: #007bff; text-decoration: none;">secretary2@jobhunt.com.my</a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Quick Links & Actions -->
            <div style="flex: 1; min-width: 200px;">
                <h4 style="color: #ffffff; font-size: 16px; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 0.5px;">Quick Links</h4>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8;">
                    <li style="margin-bottom: 6px;"><a href="intro.php" style="color: #aaa; text-decoration: none; transition: color 0.2s;">Introduction</a></li>
                    <li style="margin-bottom: 6px;"><a href="apply_job.php" style="color: #aaa; text-decoration: none; transition: color 0.2s;">Apply A Job</a></li>
                    <li style="margin-bottom: 6px;"><a href="submit_vacancy.php" style="color: #aaa; text-decoration: none; transition: color 0.2s;">Post A Job</a></li>
                    <li><a href="contact.php" style="color: #aaa; text-decoration: none; transition: color 0.2s;">Contact Us</a></li>
                </ul>
            </div>

        </div>

        <!-- Copyright Bottom Bar -->
        <div style="max-width: 1200px; margin: 20px auto 0 auto; text-align: center; font-size: 13px; color: #777;">
            <p style="margin: 0;">&copy; <?php echo date("Y"); ?> Job Hunt (www.jobhunt.com.my). All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>