<?php
/**
 * HomePage Contact Us Block Template
 */

$contactus_fields = get_fields();
?>
<section class="py-4 contact-us-section">
    <div class="container-fluid">
        <form action="">
            <div class="row justify-content-center">
                <div class="col-4">
                    <input type="text" placeholder="your Name" required>
                    <input type="email" placeholder="email Address" required>
                    <div class="row px-0">
                        <div class="col-4 padding-left-0">
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
                <div class="col-4 custom-text-size-for-placeholder">
                    <textarea class="h-100" type="text" placeholder="Write your pitch here"></textarea>
                </div>
                <div class="col-1 justify-content-center align-items-center">
                    <button type="submit">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/send-icon.svg" alt="submit-icon">
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
    $('input').focus(function () {
        var value = $(this).attr('placeholder');
        $(this).attr('placeholder', '');
    }).blur(function () {
        // Optionally restore the placeholder when the input loses focus
        $(this).attr('placeholder', value);
    });
    $('textarea').focus(function () {
        var value = $(this).attr('placeholder');
        $(this).attr('placeholder', '');
    }).blur(function () {
        // Optionally restore the placeholder when the input loses focus
        $(this).attr('placeholder', value);
    });
});
</script>