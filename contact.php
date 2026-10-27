<?php
// Include header
include 'header.php';
renderPageHero('Get in touch', 'Contact Us', 'Speak with our team or visit our office at Oval Damansara.');
?>

<!-- Main Container for Contact Page -->
<div style="max-width: 1000px; margin: 40px auto; padding: 0 20px; font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <!-- Main Section: Contact Info & Map Side-by-Side -->
    <div style="display: flex; gap: 30px; flex-wrap: wrap; margin-bottom: 40px;">

        <!-- Left Column: Official Contact Details Container -->
        <div style="flex: 1; min-width: 300px; background: #ffffff; padding: 35px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column; justify-content: center;">
            <h2 style="font-size: 24px; color: #111; margin-top: 0; margin-bottom: 25px; border-bottom: 2px solid #007bff; padding-bottom: 10px; display: inline-block;">
                Job Hunt Sdn Bhd
            </h2>

            <ul style="list-style: none; padding: 0; margin: 0; font-size: 15px; color: #555; line-height: 1.8;">

                <!-- Address -->
                <li style="margin-bottom: 22px; display: flex; gap: 15px; align-items: flex-start;">
                    <span style="font-size: 22px;">📍</span>
                    <div>
                        <strong style="color: #222; display: block; margin-bottom: 3px;">Address:</strong>
                        <a href="https://www.google.com/maps/search/?api=1&query=Unit+10-3+Oval+Damansara+Jalan+Damansara+Taman+Tun+Dr+Ismail+60000+Kuala+Lumpur" target="_blank" style="color: #555; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#007bff'" onmouseout="this.style.color='#555'">
                            Unit 10-3, 10th Floor, Oval Damansara, Jalan Damansara, Taman Tun Dr Ismail, 60000 Kuala Lumpur, Malaysia.
                        </a>
                    </div>
                </li>

                <!-- Contact No -->
                <li style="margin-bottom: 22px; display: flex; gap: 15px; align-items: center;">
                    <span style="font-size: 22px;">📞</span>
                    <div>
                        <strong style="color: #222; display: block; margin-bottom: 3px;">Contact No. (Office):</strong>
                        <a href="tel:+60377318282" style="color: #007bff; text-decoration: none; font-weight: bold; font-size: 16px;">+603 7731 8282</a>
                    </div>
                </li>

                <!-- Fax -->
                <li style="margin-bottom: 22px; display: flex; gap: 15px; align-items: center;">
                    <span style="font-size: 22px;">📠</span>
                    <div>
                        <strong style="color: #222; display: block; margin-bottom: 3px;">Fax No.:</strong>
                        <a href="tel:+60377338692" style="color: #007bff; text-decoration: none;">+603 7733 8692</a>
                    </div>
                </li>

                <!-- Dual Emails -->
                <li style="display: flex; gap: 15px; align-items: flex-start;">
                    <span style="font-size: 22px;">✉️</span>
                    <div>
                        <strong style="color: #222; display: block; margin-bottom: 5px;">Email Enquiries:</strong>
                        <div style="display: flex; flex-direction: column; gap: 5px;">
                            <a href="mailto:secretary@jobhunt.com.my" style="color: #007bff; text-decoration: none; font-weight: 500;">secretary@jobhunt.com.my</a>
                            <a href="mailto:secretary2@jobhunt.com.my" style="color: #007bff; text-decoration: none; font-weight: 500;">secretary2@jobhunt.com.my</a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

        <!-- Right Column: Interactive Google Maps Frame -->
        <div style="flex: 1.2; min-width: 320px; background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
            <h3 style="font-size: 18px; color: #111; margin-top: 0; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                🗺️ Location Map
            </h3>
            <div style="width: 100%; height: 360px; border-radius: 8px; overflow: hidden; flex: 1;">
                <iframe
                    src="https://maps.google.com/maps?q=Oval+Damansara,+Jalan+Damansara,+Taman+Tun+Dr+Ismail,+Kuala+Lumpur&t=&z=18&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
            </div>
        </div>

    </div>

</div>

<?php
// Include footer
include 'footer.php';
?>
