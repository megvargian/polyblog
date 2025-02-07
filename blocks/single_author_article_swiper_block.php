<?php
/**
 * HomePage Author Single Author Article Swiper Block
 */

$single_author_article_swiper_block = get_fields();
?>
<section class="py-5 single-author-article-swiper-section">
    <div class="container position-relative">
        <div class="swiper single-author-article-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide single-red-border">
                    <div class="row">
                        <div class="col-6 custom-padding-right">
                            <img class="w-100 h-100 d-block single-red-border-right" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/single-article-img.png" alt="article-title">
                        </div>
                        <div class="col-6 custom-padding-left">
                            <div class="d-flex justify-content-center align-items-center px-sm-5 p-2 h-100">
                                <div class="inner-author mx-auto">
                                    <p class="text-left d-md-block d-none">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam doloremque exercitationem qui laboriosam quasi ducimus fuga atque tenetur maiores quaerat, suscipit, vel similique porro, officiis harum pariatur sapiente. Nihil, deleniti?
                                    </p>
                                    <img class="single-author-img d-flex mx-auto" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/profile.png" alt="">
                                    <h6 class="pt-3 text-center">Name of the Author</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide single-red-border">
                    <div class="row">
                        <div class="col-6">
                            <img class="w-100 h-100 d-block single-red-border-right" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/single-article-img.png" alt="article-title">
                        </div>
                        <div class="col-6 custom-padding-left">
                            <div class="d-flex justify-content-center align-items-center px-sm-5 p-2 h-100">
                                <div class="inner-author mx-auto">
                                    <p class="text-left d-md-block d-none">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam doloremque exercitationem qui laboriosam quasi ducimus fuga atque tenetur maiores quaerat, suscipit, vel similique porro, officiis harum pariatur sapiente. Nihil, deleniti?
                                    </p>
                                    <img class="single-author-img d-flex mx-auto" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/profile.png" alt="">
                                    <h6 class="pt-3 text-center">Name of the Author</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide single-red-border">
                    <div class="row">
                        <div class="col-6">
                            <img class="w-100 h-100 d-block single-red-border-right" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/single-article-img.png" alt="article-title">
                        </div>
                        <div class="col-6 custom-padding-left">
                            <div class="d-flex justify-content-center align-items-center px-sm-5 p-2 h-100">
                                <div class="inner-author mx-auto">
                                    <p class="text-left d-md-block d-none">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam doloremque exercitationem qui laboriosam quasi ducimus fuga atque tenetur maiores quaerat, suscipit, vel similique porro, officiis harum pariatur sapiente. Nihil, deleniti?
                                    </p>
                                    <img class="single-author-img d-flex mx-auto" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/profile.png" alt="">
                                    <h6 class="pt-3 text-center">Name of the Author</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if(!isMob()){
            ?>
                <div class="d-lg-flex d-none swiper-button-prev swiper-button-prev-last-part"></div>
                <div class="d-lg-flex d-none swiper-button-next swiper-button-next-last-part"></div>
            <?php } ?>
        </div>
        <?php if(isMob()){ ?>
            <div class="d-lg-none d-flex swiper-button-prev swiper-button-prev-last-part" style="top: 100%;"></div>
            <div class="d-lg-none d-flex swiper-button-next swiper-button-next-last-part" style="top: 100%;"></div>
        <?php } ?>
        <div class="d-lg-none my-4 d-flex justify-content-center align-items-center swiper-mobile-single-author-article-pagination"></div>
    </div>
</section>
<script>
    jQuery(document).ready(function ($) {
        var swiper = new Swiper('.single-author-article-swiper', {
            slidesPerView: 1,
            pagination: {
                el: '.swiper-mobile-single-author-article-pagination',
                type: 'bullets',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next-last-part',
                prevEl: '.swiper-button-prev-last-part',
            },
        });
    });
</script>