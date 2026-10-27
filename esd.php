<?php
// Include header
include 'header.php';
renderPageHero('Expatriate support', 'Expatriate Services Division (ESD)', 'Guidance for Malaysian company registration and expatriate pass applications.');
?>

<!-- Main Container for ESD Page -->
<div style="max-width: 900px; margin: 40px auto; padding: 0 20px; font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <!-- Section 1: About ESD (Text on left, Picture on right) -->
    <section style="margin-bottom: 60px;">
        <div style="background: #ffffff; padding: 35px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; align-items: center; gap: 30px; flex-wrap: wrap;">
            
            <!-- Left: Description -->
            <div style="flex: 1; min-width: 280px;">
                <h3 style="font-size: 22px; color: #007bff; margin-top: 0; margin-bottom: 15px;">About ESD</h3>
                <p style="margin-bottom: 15px; font-size: 16px; color: #555;">
                    In Malaysia, the Expatriate Services Division (ESD) falls under the Immigration Department. Companies planning to employ expatriates with work permits in Malaysia must initiate their registration process with the ESD.
                </p>
                <p style="margin: 0; font-size: 16px; color: #555;">
                    After receiving approval from the Immigration Department, your company can proceed to apply for various Expatriate Visas or passes, such as Employment Pass, Professional Visit Pass, Dependent Pass, Long-Term Social Visit Pass, and Social Visit (Temporary Employment) – Foreign Maid Pass.
                </p>
            </div>

            <!-- Right: Picture Slot -->
            <div style="flex: 0 0 320px; text-align: center;">
                <!-- Replace src with your actual image path -->
                <img src="assets/esd.jpg" alt="About ESD" style="width: 100%; max-height: 220px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <!-- Fallback box if image isn't uploaded yet -->
                <div style="display: none; width: 100%; height: 180px; background: #f1f5f9; border-radius: 8px; align-items: center; justify-content: center; color: #888; font-size: 14px; border: 1px dashed #ccc;">
                    [Picture Slot: About ESD]
                </div>
            </div>

        </div>
    </section>

    <!-- Section 2: Registering - Basic Requirements (Alternating Layout) -->
    <section>
        <h2 style="font-size: 28px; color: #222; margin-bottom: 15px; text-align: center;">Registering with ESD</h2>
        <p style="text-align: center; font-size: 16px; color: #666; margin-bottom: 40px;">Basic Requirements to Register with ESD</p>

        <div style="display: flex; flex-direction: column; gap: 30px;">

            <!-- Requirement 1: SSM Registration (Picture Left, Text Right) -->
            <div style="background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; align-items: center; gap: 30px; flex-wrap: wrap;">
                <div style="flex: 0 0 280px; text-align: center;">
                    <img src="assets/ssm.png" alt="SSM Registration" style="width: 100%; max-height: 180px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none; width: 100%; height: 150px; background: #f1f5f9; border-radius: 8px; align-items: center; justify-content: center; color: #888; font-size: 13px; border: 1px dashed #ccc;">[Picture Slot: SSM]</div>
                </div>
                <div style="flex: 1; min-width: 250px;">
                    <h3 style="font-size: 20px; color: #007bff; margin-top: 0; margin-bottom: 12px;">1. SSM Registration</h3>
                    <p style="margin: 0 0 10px 0; font-size: 15px; color: #555;">The Company must be registered with either:</p>
                    <ul style="margin: 0; padding-left: 20px; color: #555; font-size: 15px; line-height: 1.6;">
                        <li>The Companies Commission of Malaysia (SSM) under Companies Act 1965 / 2016</li>
                        <li>The Registry of Societies Malaysia under the Organisation Act 1966</li>
                        <li>Associations/Cooperatives registered under the laws of Malaysia</li>
                    </ul>
                </div>
            </div>

            <!-- Requirement 2: Clearance License (Text Left, Picture Right - Flipped) -->
            <div style="background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; align-items: center; gap: 30px; flex-wrap: wrap; flex-direction: row-reverse;">
                <div style="flex: 0 0 280px; text-align: center;">
                    <img src="assets/clearance_license.jpg" alt="Clearance License" style="width: 100%; max-height: 180px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none; width: 100%; height: 150px; background: #f1f5f9; border-radius: 8px; align-items: center; justify-content: center; color: #888; font-size: 13px; border: 1px dashed #ccc;">[Picture Slot: WRT License]</div>
                </div>
                <div style="flex: 1; min-width: 250px;">
                    <h3 style="font-size: 20px; color: #007bff; margin-top: 0; margin-bottom: 12px;">2. Clearance License</h3>
                    <p style="margin: 0; font-size: 15px; color: #555; line-height: 1.6;">
                        For companies that are 100% foreign-owned in the business of import/export/wholesale/retail/restaurant/consultancy/services industry, it is mandatory to obtain the WRT license/clearance to proceed with the ESD registration.
                    </p>
                </div>
            </div>

            <!-- Requirement 3: Local Town Council License (Picture Left, Text Right) -->
            <div style="background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; align-items: center; gap: 30px; flex-wrap: wrap;">
                <div style="flex: 0 0 280px; text-align: center;">
                    <img src="assets/council_license.jpg" alt="Local Town Council License" style="width: 100%; max-height: 180px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none; width: 100%; height: 150px; background: #f1f5f9; border-radius: 8px; align-items: center; justify-content: center; color: #888; font-size: 13px; border: 1px dashed #ccc;">[Picture Slot: Town Council]</div>
                </div>
                <div style="flex: 1; min-width: 250px;">
                    <h3 style="font-size: 20px; color: #007bff; margin-top: 0; margin-bottom: 12px;">3. Local Town Council License</h3>
                    <p style="margin: 0; font-size: 15px; color: #555; line-height: 1.6;">
                        Company’s Business license/premise and signboard license from the local town council such as DBKL, MPPJ, MBSA, MBSJ and/or specific industry sector license is mandatory for the ESD registration and WRT license application.
                    </p>
                </div>
            </div>

            <!-- Requirement 4: 12 Months Validity (Text Left, Picture Right - Flipped) -->
            <div style="background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #eaeaea; display: flex; align-items: center; gap: 30px; flex-wrap: wrap; flex-direction: row-reverse;">
                <div style="flex: 0 0 280px; text-align: center;">
                    <img src="assets/12_months.jpg" alt="12 Months Validity" style="width: 100%; max-height: 180px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none; width: 100%; height: 150px; background: #f1f5f9; border-radius: 8px; align-items: center; justify-content: center; color: #888; font-size: 13px; border: 1px dashed #ccc;">[Picture Slot: Tenancy Agreement]</div>
                </div>
                <div style="flex: 1; min-width: 250px;">
                    <h3 style="font-size: 20px; color: #007bff; margin-top: 0; margin-bottom: 12px;">4. 12 Months Validity</h3>
                    <p style="margin: 0; font-size: 15px; color: #555; line-height: 1.6;">
                        Company’s tenancy agreement (minimum 12 months validity) and company phone bill are required for the ESD registration. If you do not have a physical office/space, a Virtual office or Serviced office is acceptable but not SOHO/Home office.
                    </p>
                </div>
            </div>

        </div>
    </section>

</div>

<?php
// Include footer
include 'footer.php';
?>
