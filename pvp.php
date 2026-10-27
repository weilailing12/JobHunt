<?php
// Include header
include 'header.php';
renderPageHero('Short-term professional work', 'Professional Visit Pass (PVP)', 'Support for short-term projects, professional training and internship programmes in Malaysia.');
?>

<!-- Main Container for PVP Page -->
<div style="max-width: 900px; margin: 40px auto; padding: 0 20px; font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <!-- Section 1: Hero & About PVP -->
    <section style="text-align: center; margin-bottom: 50px;">
        <!-- About Box -->
        <div style="background: #ffffff; padding: 35px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; text-align: left; margin-bottom: 30px;">
            <h3 style="font-size: 22px; color: #007bff; margin-top: 0; margin-bottom: 15px;">About the Professional Visit Pass Malaysia</h3>
            <p style="margin-bottom: 15px; font-size: 16px; color: #555;">
                The Professional Visit Pass (PVP) is issued to foreign individuals possessing specialized professional qualifications or skills. It allows them to engage in work or practical training with a Malaysian organization on behalf of an overseas entity for a temporary period.
            </p>
            <p style="margin-bottom: 20px; font-size: 16px; color: #555;">
                Job Hunt’s professional services assist employers in navigating the application process correctly, facilitating a seamless experience for foreign talents associated with any company.
            </p>
            
            <!-- Validity Box -->
            <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 4px solid #007bff;">
                <h4 style="margin: 0 0 10px 0; color: #222; font-size: 16px;">Validity Terms:</h4>
                <ul style="margin: 0; padding-left: 20px; color: #555; font-size: 15px; line-height: 1.6;">
                    <li><strong>12 months maximum</strong> with no extensions allowed</li>
                    <li><strong>6 months</strong> for those attending training</li>
                    <li>PVP can only be applied <strong>once in a lifetime</strong></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Section 2: Eligibility Categories (Grid Layout with Photos) -->
    <section style="margin-bottom: 50px;">
        <h2 style="text-align: center; font-size: 28px; color: #222; margin-bottom: 10px;">Eligibility</h2>
        <p style="text-align: center; font-size: 16px; color: #666; margin-bottom: 30px;">Who qualifies for the Professional Visit Pass?</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 25px;">
            
            <!-- Card 1: Foreign Artist -->
            <div style="background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8f9fa; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <img src="assets/singer.jpg" alt="Foreign Artist" style="max-width: 100%; max-height: 100%; object-fit: contain;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #718096; font-size: 13px;">[Photo: Foreign Artist]</div>
                </div>
                <div style="padding: 25px; flex: 1;">
                    <h3 style="font-size: 18px; color: #007bff; margin-top: 0; margin-bottom: 12px; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px;">Foreign Artist (Filming & Performance)</h3>
                    <ul style="margin: 0; padding-left: 20px; color: #555; font-size: 14px; line-height: 1.6;">
                        <li>Stage artist (singing, music, dance, theatre, acrobatics, circus, etc.)</li>
                        <li>Filming (in Malaysia with an overseas company) & Producing</li>
                        <li>Performance in hotels, cultural centers, stadiums, etc.</li>
                        <li>Expert in arts management and screen-related arts</li>
                    </ul>
                </div>
            </div>

            <!-- Card 2: Islamic Missionary -->
            <div style="background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8f9fa; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <img src="assets/islamic.jpg" alt="Islamic Missionary" style="max-width: 100%; max-height: 100%; object-fit: contain;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #718096; font-size: 13px;">[Photo: Islamic Missionary]</div>
                </div>
                <div style="padding: 25px; flex: 1;">
                    <h3 style="font-size: 18px; color: #007bff; margin-top: 0; margin-bottom: 12px; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px;">Islamic Missionary</h3>
                    <ul style="margin: 0; padding-left: 20px; color: #555; font-size: 14px; line-height: 1.6;">
                        <li>Islamic Teacher</li>
                        <li>Al-Quran Teacher</li>
                        <li>Arabic Teacher</li>
                    </ul>
                </div>
            </div>

            <!-- Card 3: Other Religious Workers -->
            <div style="background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8f9fa; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <img src="assets/guru.jpg" alt="Other Religious Workers" style="max-width: 100%; max-height: 100%; object-fit: contain;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #718096; font-size: 13px;">[Photo: Religious Workers]</div>
                </div>
                <div style="padding: 25px; flex: 1;">
                    <h3 style="font-size: 18px; color: #007bff; margin-top: 0; margin-bottom: 12px; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px;">Other Religious Workers</h3>
                    <ul style="margin: 0; padding-left: 20px; color: #555; font-size: 14px; line-height: 1.6;">
                        <li>Gurukkal & Granthi</li>
                        <li>Priest & Guru Dharma</li>
                        <li>Religious musicians & sculptors</li>
                    </ul>
                </div>
            </div>

            <!-- Card 4: Others -->
            <div style="background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8f9fa; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <img src="assets/student.jpg" alt="Other Categories" style="max-width: 100%; max-height: 100%; object-fit: contain;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none; width: 100%; height: 100%; background: #e2e8f0; align-items: center; justify-content: center; color: #718096; font-size: 13px;">[Photo: Other Categories]</div>
                </div>
                <div style="padding: 25px; flex: 1;">
                    <h3 style="font-size: 18px; color: #007bff; margin-top: 0; margin-bottom: 12px; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px;">Other Categories</h3>
                    <ul style="margin: 0; padding-left: 20px; color: #555; font-size: 14px; line-height: 1.6;">
                        <li>International students studying at Malaysia Bible Seminary</li>
                        <li>Government officials (G2G programs / official purposes)</li>
                        <li>Jockey experts & Volunteers</li>
                        <li>International students under mobility programs or industrial training</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- Section 3: Required Documents -->
    <section style="margin-bottom: 50px;">
        <h2 style="text-align: center; font-size: 28px; color: #222; margin-bottom: 25px;">Required Documents</h2>
        
        <div style="background: #ffffff; padding: 35px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea;">
            <p style="margin-bottom: 20px; font-size: 16px; color: #555;">When arriving in Malaysia, you must meet certain requirements depending on your career:</p>
            
            <ul style="list-style: none; padding: 0; margin: 0 0 25px 0; font-size: 15px; color: #555; line-height: 1.8;">
                <li style="margin-bottom: 10px;"><strong>a. Passport:</strong> Minimum 6 months validity from intended entry date, plus a complete copy.</li>
                <li style="margin-bottom: 10px;"><strong>b. Photo:</strong> Passport-size picture of yourself.</li>
                <li style="margin-bottom: 10px;"><strong>c. Forms:</strong> Malaysia visa application forms (IMM. 12 and IMM. 38).</li>
                <li style="margin-bottom: 10px;"><strong>d. Sponsor Letter:</strong> Letter of offer from Malaysian company/institution (sponsor) including reason for employment/training.</li>
                <li style="margin-bottom: 10px;"><strong>e. Company Profile:</strong> A copy of your sponsor’s company profile (if applicable).</li>
                <li style="margin-bottom: 10px;"><strong>f. Students:</strong> Additional documents if you're an international student.</li>
                <li style="margin-bottom: 10px;"><strong>g. Religious Missionaries:</strong> Approval letter from the Department of Religion and Islamic Religious Department.</li>
                <li><strong>h. Chinese Citizens:</strong> Bank guarantee / personal security bond.</li>
            </ul>

            <div style="background: #fff3cd; border: 1px solid #ffeeba; color: #856404; padding: 15px; border-radius: 6px; font-size: 14px;">
                <strong>Keep in mind:</strong> This is not an exhaustive list. You and your sponsor should enquire with the Immigration Department of Malaysia regarding the full document list required for your specific application.
            </div>
        </div>
    </section>

    <!-- Section 4: Application Process & Why Choose Us -->
    <section style="margin-bottom: 50px;">
        <h2 style="text-align: center; font-size: 28px; color: #222; margin-bottom: 25px;">Application Process</h2>
        
        <div style="background: #ffffff; padding: 35px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; margin-bottom: 30px;">
            <h3 style="font-size: 20px; color: #007bff; margin-top: 0; margin-bottom: 15px;">General Application Steps</h3>
            <ol style="margin: 0 0 25px 0; padding-left: 20px; color: #555; font-size: 16px; line-height: 1.8;">
                <li>Fill out the application forms.</li>
                <li>Have a sponsor (the company/institution you’ll be working/training in) submit the application before your arrival in Malaysia.</li>
                <li>Submit your application to the Malaysian Federal Government Administrative Centre (Ministry of Home Affairs, Immigration Department) in Putrajaya.</li>
            </ol>

            <h3 style="font-size: 20px; color: #28a745; margin-top: 0; margin-bottom: 15px;">Filming Industry Only (Additional Requirements)</h3>
            <ol style="margin: 0; padding-left: 20px; color: #555; font-size: 16px; line-height: 1.8;">
                <li>Submit the application to the Central Agency for Filming and Performance by Foreign Artistes (PUSPAL), who will work with the Immigration Department for approval.</li>
                <li>Obtain the approval letter from FINAS (National Film Development Corporation Malaysia).</li>
            </ol>
        </div>

        <!-- Why Choose Job Hunt -->
        <div style="background: #ffffff; padding: 35px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; border-left: 5px solid #007bff;">
            <h3 style="font-size: 22px; color: #222; margin-top: 0; margin-bottom: 15px;">Why Choose Job Hunt for Professional Visit Pass Applications?</h3>
            <p style="margin: 0; font-size: 16px; color: #555; line-height: 1.7;">
                Having accumulated almost 20 years of expertise, we possess in-depth knowledge of the legal and application procedures in Malaysia. This proficiency enables companies and foreign employees in obtaining proper legal approvals to conduct their operations in compliance with Malaysian laws and regulations, ensuring a secure and lawful environment.
            </p>
        </div>
    </section>

</div>

<?php
// Include footer
include 'footer.php';
?>
