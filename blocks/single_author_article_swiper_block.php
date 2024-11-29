<?php
/**
 * HomePage Author Single Author Article Swiper Block
 */

$single_author_article_swiper_block = get_fields();
?>
<section class="py-5 single-author-article-swiper-section">
    <div class="container">
        <div class="swiper single-author-article-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-6">
                            <img class="w-100 d-block single-red-border" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/single-article-img.png" alt="article-title">
                        </div>
                        <div class="col-6">
                            <div class="w-100 d-block single-red-border">
                                <div class="inner-author mx-auto">
                                    <p class="text-left">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam doloremque exercitationem qui laboriosam quasi ducimus fuga atque tenetur maiores quaerat, suscipit, vel similique porro, officiis harum pariatur sapiente. Nihil, deleniti?
                                    </p>
                                    <img class="single-author-img" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/profile.png" alt="">
                                    <p>Name of the Author</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-6">
                            <img class="w-100 d-block single-red-boder" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/single-article-img.png" alt="article-title">
                        </div>
                        <div class="col-6">
                            <div class="w-100 d-block single-red-boder">
                                <div class="inner-author mx-auto">
                                    <p class="text-left">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam doloremque exercitationem qui laboriosam quasi ducimus fuga atque tenetur maiores quaerat, suscipit, vel similique porro, officiis harum pariatur sapiente. Nihil, deleniti?
                                    </p>
                                    <img class="single-author-img" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/profile.png" alt="">
                                    <p>Name of the Author</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev swiper-button-prev-last-part"></div>
            <div class="swiper-button-next swiper-button-next-last-part"></div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function ($) {
        var swiper = new Swiper('.single-author-article-swiper', {
            loop: true,
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-prev-last-part',
                prevEl: '.swiper-button-next-last-part',
            },
        });
    });
</script>