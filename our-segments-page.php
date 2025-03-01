<?php
/**
 * Template Name: Our Segments Page
 */

get_header();
?>
<section class="our-segments-page">
    <div class="container">
        <div class="row pt-2 mb-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row text-center py-5">
            <div class="col-12">
                <div class="bg-black">
                    <h1>
                        <span class="en-bold"><?php the_title(); ?></span>
                        <span class="ar-bold">كيــــف منشـــوف</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
    <!-- <section>
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 pb-5">
                    <img class="d-md-block d-none w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/our-segements-first-img.png" alt="">
                    <img class="d-md-none d-block w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/our-segements-mob.png" alt="">
                </div>
                <div class="col-6 text-left">
                    <h5 class="en-bold mb-2">SYNOPSIS</h5>
                    <p class="en-regular">
                        In Syria, following the recent ousting of President Bashar al-Assad,In Syria, following the recent ousting of President Bashar al-Assad,In Syria
                    </p>
                </div>
                <div class="col-6 text-right">
                    <h5 class="ar-bold mb-2">ملخص</h5>
                    <p class="ar-regular">
                    لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-orange-section">
        <div class="white-line"></div>
        <div class="container py-sm-5 py-3">
            <div class="row mb-5">
                <div class="col-12">
                    <img class="d-md-block d-none w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/our-segement-second-img.png" alt="">
                    <img class="d-md-none d-block w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/our-segements-mob.png" alt="">
                </div>
            </div>
            <div class="row custom-border-radius py-3 px-4">
                <div class="col-6 text-left">
                    <h5 class="en-bold mb-2">SYNOPSIS</h5>
                    <p class="en-regular">
                        In Syria, following the recent ousting of President Bashar al-Assad,In Syria, following the recent ousting of President Bashar al-Assad,In Syria
                    </p>
                </div>
                <div class="col-6 text-right">
                    <h5 class="ar-bold mb-2">ملخص</h5>
                    <p class="ar-regular">
                    لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار
                    </p>
                </div>
            </div>
        </div>
        <div class="white-line"></div>
    </section>
    <section>
        <div class="container">
            <div class="row py-sm-5 py-3">
                <div class="col-12 pb-5">
                    <img class="d-md-block d-none w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/our-segement-third-img.png" alt="">
                    <img class="d-md-none d-block w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/our-segements-mob.png" alt="">
                </div>
                <div class="col-6 text-left">
                    <h5 class="en-bold mb-2">SYNOPSIS</h5>
                    <p class="en-regular">
                        In Syria, following the recent ousting of President Bashar al-Assad,In Syria, following the recent ousting of President Bashar al-Assad,In Syria
                    </p>
                </div>
                <div class="col-6 text-right">
                    <h5 class="ar-bold mb-2">ملخص</h5>
                    <p class="ar-regular">
                    لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-orange-section">
        <div class="white-line"></div>
        <div class="container py-sm-5 py-3">
            <div class="row mb-5">
                <div class="col-12">
                    <img class="d-md-block d-none w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/our-segement-fourth-img.png" alt="">
                    <img class="d-md-none d-block w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/our-segements-mob.png" alt="">
                </div>
            </div>
            <div class="row custom-border-radius py-3 px-4">
                <div class="col-6 text-left">
                    <h5 class="en-bold mb-2">SYNOPSIS</h5>
                    <p class="en-regular">
                        In Syria, following the recent ousting of President Bashar al-Assad,In Syria, following the recent ousting of President Bashar al-Assad,In Syria
                    </p>
                </div>
                <div class="col-6 text-right">
                    <h5 class="ar-bold mb-2">ملخص</h5>
                    <p class="ar-regular">
                    لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار
                    </p>
                </div>
            </div>
        </div>
        <div class="white-line mb-5"></div>
    </section> -->
</section>
<?php
get_footer();
