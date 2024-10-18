<?php
/**
 * HomePage Contact Us Block Template
 */

$contactus_fields = get_fields();
?>
<section class="py-4 contact-us-section">
    <div class="container-fluid">
        <form action="">
            <div class="row">
                <div class="col-6">
                    <input type="text" placeholder="your Name" required>
                    <input type="email" placeholder="email Address" required>
                    <div class="row px-0">
                        <div class="col-4">
                            <input type="number" placeholder="country code" required>
                        </div>
                        <div class="col-8">
                            <input type="tel" placeholder="phone number" required>
                        </div>
                    </div>
                    <input type="text" placeholder="social media links if relevant" required>
                    <input type="text" placeholder="areas of interest" required>
                    <input type="text" placeholder="Links to previous writings if present" required>
                </div>
                <div class="col-6 custom-text-size-for-placeholder">
                    <input class="h-100" type="text" placeholder="Write&#10;your&#10;pitch&#10;here">
                </div>
            </div>
        </form>
    </div>
</section>