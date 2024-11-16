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
                    <div class="d-flex align-items-center select-language">
                        <label for="languages">I CAN WRITE IN:</label>
                        <select id="languages" name="languages[]" multiple>
                            <option value="english">English</option>
                            <option value="arabic1">عربي</option>
                            <option value="arabic2">عربي</option>
                        </select>
                    </div>
                </div>
                <div class="col-4 custom-text-size-for-placeholder">
                    <textarea class="h-100" type="text" placeholder="Write your pitch here"></textarea>
                </div>
                <div class="col-1 d-flex justify-content-center align-items-center">
                    <button type="submit" class="submit-button">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/send-icon.svg" alt="submit-icon">
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
    $('input, textarea').focus(function () {
        $(this).attr('placeholder', '');
    })
    $('#languages').select2({
        placeholder: "Select languages",
        allowClear: true
    });

    // $('textarea').focus(function () {
    //     $(this).attr('placeholder', '');
    // })
});
</script>