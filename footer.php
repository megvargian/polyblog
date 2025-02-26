<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
$general_fields = get_fields('options');
$footer_menu = $general_fields['footer']['footer_menu'];
$footer_social_links = $general_fields['footer']['footer_social_links'];
?>
<?php if (is_single('post')) {?>
<section class="py-4 d-md-block d-none contact-us-section-light">
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
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/send-icon.svg"
                            alt="submit-icon">
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
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/X_logo_mobile.svg"
                                            alt="X">
                                    </li>
                                    <li class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/facebook-mobile.svg"
                                            alt="X">
                                    </li>
                                    <li class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/X_logo_mobile.svg"
                                            alt="X">
                                    </li>
                                    <li class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/facebook-mobile.svg"
                                            alt="X">
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
                        <textarea class="" style="height: 15rem;" type="text"
                            placeholder="Write your pitch here"></textarea>
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
<?php }?>
<?php if (is_front_page()) {?>
<section style="background-color: #181617;">
    <div class="container pt-5">
        <div class="row pb-md-3 pb-5 pt-md-5 last-footer-section">
            <div class="col-12 text-center">
                <div>
                    <h3 class="en-regular en">Youth-led, Lebanese political media</h3>
                    <h3 class="ar-regular ar">منصة إعلامية سياسية شبابية ولبنانية</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
</div><!-- #content -->
</div><!-- #page -->
<footer
    class="footer-container pt-sm-5 pt-0 <?php echo get_post_type() === 'authors' || is_page(293) ? 'footer-container-color' : 'footer-container-default' ?>">
    <div class="container pt-sm-3 pt-0">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12 justify-content-center d-flex">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 col-12 px-3">
                        <?php foreach ($footer_menu as $key => $menu_item) {
                            echo $key;
                            if($menu_item['footer_item']['ispopuptext_or_url']){
                             ?>
                        <button class="d-flex justify-content-between" data-bs-toggle="modal"
                            data-bs-target="#<?php echo strtolower(str_replace(' ', '-', $menu_item['footer_item']['ar_text']));?>">
                            <span class="en-regular"><?php echo $menu_item['footer_item']['en_text']; ?></span>
                            <span class="ar-regular"><?php echo $menu_item['footer_item']['ar_text']; ?></span>
                        </button>
                        <?php } else { ?>
                        <a class="d-flex justify-content-between"
                            href="<?php echo $menu_item['footer_item']['url']; ?>">
                            <span class="en-regular"><?php echo $menu_item['footer_item']['en_text']; ?></span>
                            <span class="ar-regular"><?php echo $menu_item['footer_item']['ar_text']; ?></span>
                        </a>
                        <?php }} ?>
                        <!-- <button class="d-flex justify-content-between" data-bs-toggle="modal"
                            data-bs-target="#contact-us">
                            <span class="en-regular">about us</span>
                            <span class="ar-regular">معلومات عنا</span>
                        </button>
                        <button class="d-flex justify-content-between" data-bs-toggle="modal"
                            data-bs-target="#contact-us">
                            <span class="en-regular">Editorial line</span>
                            <span class="ar-regular">الخط التحريري</span>
                        </button>
                        <button class="d-flex justify-content-between" data-bs-toggle="modal"
                            data-bs-target="#contact-us">
                            <span class="en-regular">Meet our voices</span>
                            <span class="ar-regular">تعرف على أصواتنا</span>
                        </button> -->
                        <div class="d-block d-lg-none">
                            <button class="d-flex justify-content-between" data-bs-toggle="modal"
                                data-bs-target="#contact-us">
                                <span class="en-regular">Mission</span>
                                <span class="ar-regular"> مهمة</span>
                            </button>
                            <button class="d-flex justify-content-between" data-bs-toggle="modal"
                                data-bs-target="#contact-us">
                                <span class="en-regular">Vision</span>
                                <span class="ar-regular"> رؤية</span>
                            </button>
                            <button class="d-flex justify-content-between" data-bs-toggle="modal"
                                data-bs-target="#contact-us">
                                <span class="en-regular">Causes</span>
                                <span class="ar-regular"> الأسباب</span>
                            </button>
                        </div>
                        <div class="row d-lg-flex d-none">
                            <div class="col-6">
                                <button data-bs-toggle="modal" data-bs-target="#contact-us">
                                    contact us
                                </button>
                                <button class="full" data-bs-toggle="modal" data-bs-target="#contact-us">
                                    Be our advocate
                                </button>
                            </div>
                            <div class="col-6 justify-content-center d-flex position-relative outer-phone">
                                <img class="d-block w-100"
                                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/Group.svg"
                                    alt="phone">
                                <div class="inner-phone">
                                    <p>
                                        Follow us !
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?php echo $footer_social_links['insta_url']; ?>">
                                            <img class="w-100 empty"
                                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/instagram_footer.svg"
                                                alt="instagram">
                                            <img class="w-100 fill"
                                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/instagram_footer_fill.svg"
                                                alt="instagram">
                                        </a>
                                        <a href="<?php echo $footer_social_links['x_url']; ?>">
                                            <img class="w-100 empty"
                                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/twitter_footer.svg"
                                                alt="X">
                                            <img class="w-100 fill"
                                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/twitter_footer_fill.svg"
                                                alt="X">
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?php echo $footer_social_links['fb_url']; ?>">
                                            <img class="w-100 empty"
                                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/facebook_footer.svg"
                                                alt="facebook">
                                            <img class="w-100 fill"
                                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/facebook_footer_fill.svg"
                                                alt="facebook">
                                        </a>
                                        <a href="<?php echo $footer_social_links['youtube_url']; ?>">
                                            <img class="w-100 empty"
                                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube_footer.svg"
                                                alt="youtube">
                                            <img class="w-100 fill"
                                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube_footer_fill.svg"
                                                alt="youtube">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-2 d-lg-none d-flex">
                            <div class="col-6">
                                <button data-bs-toggle="modal" data-bs-target="#contact-us">
                                    contact us
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="full" data-bs-toggle="modal" data-bs-target="#contact-us">
                                    Be our advocate
                                </button>
                            </div>
                        </div>
                        <div class="row gx-2 d-lg-none d-flex justify-content-center">
                            <div class="col-12">
                                <button class="full text-center custom-width w-100 donate" data-bs-toggle="modal"
                                    data-bs-target="#contact-us">
                                    <img class="heart"
                                        src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/heart-green.svg"
                                        alt="heart-donate">
                                    Donate
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 px-1 d-lg-block d-none">
                        <div class="custom-rotate">
                            <button class="d-flex justify-content-between" data-bs-toggle="modal"
                                data-bs-target="#contact-us">
                                <span class="en-regular">Mission</span>
                                <span class="ar-regular"> مهمة</span>
                            </button>
                            <button class="d-flex justify-content-between" data-bs-toggle="modal"
                                data-bs-target="#contact-us">

                                <span class="en-regular">Vision</span>
                                <span class="ar-regular">رؤية</span>
                            </button>
                            <button class="d-flex justify-content-between" data-bs-toggle="modal"
                                data-bs-target="#contact-us">
                                <span class="en-regular">Causes</span>
                                <span class="ar-regular">الأسباب</span>
                            </button>
                        </div>
                        <div class="row">
                            <button class="full text-center custom-width donate" data-bs-toggle="modal"
                                data-bs-target="#contact-us">
                                <img class="heart"
                                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/heart-green.svg"
                                    alt="heart-donate">
                                Donate
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php foreach ($footer_menu as $key => $menu_item) {
    if($menu_item['footer_item']['ispopuptext_or_url']){
        ?>
<div class="modal fade custom-modal"
    id="<?php echo strtolower(str_replace(' ', '-', $menu_item['footer_item']['en_text']));?>" tabindex="-1"
    aria-labelledby="<?php echo strtolower(str_replace(' ', '-', $menu_item['footer_item']['en_text']));?>Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header">
                <button type="button" class="btn-close m-0 remove-border-onFocus" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $menu_item['footer_item']['pop_up_text'];?>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
<div class="modal fade custom-modal" id="contact-us" tabindex="-1" aria-labelledby="contact-usLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header">
                <button type="button" class="btn-close m-0 remove-border-onFocus" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus sit ipsa tenetur magnam fugit.
                Laborum, iure nulla nisi dolores alias ipsum sit tempora ab cumque corporis incidunt, repellendus
                quaerat!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus sit ipsa tenetur magnam fugit.
                Laborum, iure nulla nisi dolores alias ipsum sit tempora ab cumque corporis incidunt, repellendus
                quaerat!
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>