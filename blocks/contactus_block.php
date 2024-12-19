<?php
/**
 * HomePage Contact Us Block Template
 */

$contactus_fields = get_fields();
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
?>
<section class="py-4 d-md-block d-none <?php echo $contactus_fields['light_mode'] ? 'contact-us-section-light' : 'contact-us-section' ;?>">
    <div class="container-fluid">
        <form action="/">
            <div class="row justify-content-center">
                <div class="col-5">
                    <input type="text" placeholder="your Name" required>
                    <input type="email" placeholder="email Address" required>
                    <div class="row px-0">
                        <div class="col-4 padding-left-0">
                            <input type="tel" placeholder="country code" required>
                        </div>
                        <div class="col-8">
                            <input type="tel" placeholder="phone number" required>
                        </div>
                    </div>
                    <input type="text" placeholder="social media links if relevant" required>
                    <input type="text" placeholder="areas of interest" required>
                    <input type="text" placeholder="Links to previous writings if present" required>
                    <div class="d-flex justify-content-between align-items-center select-language">
                        <label for="languages">I CAN WRITE IN:</label>
                        <select id="languages" name="languages[]" multiple>
                            <option value="english">English</option>
                            <option value="arabic1">عربي</option>
                        </select>
                    </div>
                </div>
                <div class="col-5 custom-text-size-for-placeholder">
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
<section class="py-4 contact-us-section d-md-none">
    <div class="container d-block">
        <form action="/" class="p-3 py-5 position-relative">
            <div class="swiper contact-us-swiper-mobile">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="d-block">
                            <h4 class="text-center pb-2">Step 1:</h4>
                            <input type="text" placeholder="your Name" required>
                            <input type="email" placeholder="email Address" required>
                            <div class="row px-0">
                                <div class="col-4 padding-left-0">
                                    <input type="tel" placeholder="country code" required>
                                </div>
                                <div class="col-8">
                                    <input type="tel" placeholder="phone number" required>
                                </div>
                            </div>
                            <!-- <input type="text" placeholder="social media links if relevant" required> -->
                            <div class="d-block mb-3">
                                <p class="px-3 mb-2">Social media links</p>
                                <ul class="d-flex justify-content-between align-items-center social-icons-mobile">
                                    <li class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/X_logo_mobile.svg" alt="X">
                                    </li>
                                    <li class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/facebook-mobile.svg" alt="X">
                                    </li>
                                    <li class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/X_logo_mobile.svg" alt="X">
                                    </li>
                                    <li class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/facebook-mobile.svg" alt="X">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex mx-auto justify-content-center py-2">
                                <button class="next-button" name="next-slide">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <h4 class="text-center pb-2">Step 3:</h4>
                        <input type="text" placeholder="areas of interest" required>
                        <input type="text" placeholder="Links to previous writings if present" required>
                        <div class="d-block mb-3">
                            <p class="px-3 mb-2">I CAN WRITE IN:</p>
                            <ul class="d-flex justify-content-start align-items-center langs">
                                <li class="">
                                    <button>English</button>
                                </li>
                                <li class="mx-2">
                                    <button>Arabic</button>
                                </li>
                                <li class="">
                                    <button>French</button>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mx-auto justify-content-center py-2">
                            <button class="next-button" name="next-slide">
                                Next
                            </button>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <h4 class="text-center pb-2">Step 3:</h4>
                        <textarea class="" style="height: 15rem;" type="text" placeholder="Write your pitch here"></textarea>
                        <div class="d-flex mx-auto justify-content-center py-2">
                            <button type="submit" name="submit" class="next-button">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination swiper-mobile-pagination"></div>
        </form>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
    // $('input, textarea').focus(function () {
    //     $(this).attr('placeholder', '');
    // })
    $('#languages').select2({
        placeholder: "Select languages",
        allowClear: true
    });
    $('#languages').on('change', function(){
        var count = $('#select2-languages-container li').length;
        if(count>0){
            $('.select2-search__field').addClass('d-none');
        } else {
            $('.select2-search__field').removeClass('d-none');
        }
        console.log('Number of <li> tags:', count);
    });

    // $('textarea').focus(function () {
    //     $(this).attr('placeholder', '');
    // })
    const swiperMobileContactForm = new Swiper('.contact-us-swiper-mobile', {
        slidesPerView: 1,
        spaceBetween: 30,
        dir: 'rtl',
        pagination: {
            el: '.swiper-mobile-pagination',
            type: 'bullets',
            clickable: true,
        },
    });
    $('.next-button').on('click', function () {
        swiperMobileContactForm.slideNext();
    });
    $('.langs button').on('click', function () {
        $(this).toggleClass('active');
    })
});
</script>