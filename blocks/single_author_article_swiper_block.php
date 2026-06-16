<?php
/**
 * Single Author Article Swiper Block
 */

$single_author_article_swiper_block = get_fields();
$all_articles = $single_author_article_swiper_block['articles'];
?>
<section class="py-5 single-author-article-swiper-section">
    <div class="container position-relative">
        <div class="swiper single-author-article-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($all_articles as $key => $value) {
                        $article_id = $value['article'];
                        $article_title = get_the_title($article_id);
                        $get_article_fields = get_fields($article_id);
                        $author_id = $get_article_fields['author'];
                        $featured_image = $get_article_fields['article_thumbnail'];
                        $author_image = get_the_post_thumbnail_url($author_id);
                        $author_title = get_the_title($author_id);
                        $author_excpert = get_the_excerpt($author_id);
                        $is_youtube_video = get_field('youtube_url', $article_id);

                    ?>
                    <div class="swiper-slide single-red-border">
                        <div class="row">
                            <div class="col-6 custom-padding-right">
                                <a href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : get_permalink($article_id); ?>"  class="<?php echo $is_youtube_video ? 'w-100 h-100 position-relative' : ''; ?>">
                                    <?php if($is_youtube_video) : ?>
                                        <svg id="Layer_1" class="play-icon position-absolute" alt="play" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 449.9 500">
                                            <path class="st0" fill="#fff" d="M81.5,11.05C36.54-14.83,0,6.32,0,58.23v382.88c0,51.93,36.54,73.05,81.5,47.26l334.67-191.96c44.98-25.79,44.98-67.68,0-93.49L81.5,11.05ZM81.5,11.05"/>
                                        </svg>
                                    <?php endif; ?>
                                    <img class="w-100 h-100 d-block single-red-border-right" src="<?php echo $featured_image; ?>" alt="<?php echo esc_attr($article_title); ?>">
                                </a>
                            </div>
                            <div class="col-6 custom-padding-left">
                                <div class="d-flex justify-content-center align-items-center px-sm-5 p-2 h-100">
                                    <div class="inner-author mx-auto">
                                        <p class="text-left d-md-block d-none">
                                            <?php echo esc_html($author_excpert); ?>
                                        </p>
                                        <a href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : get_permalink($article_id); ?>" class="text-decoration-none">
                                            <img class="single-author-img d-flex mx-auto" src="<?php echo $author_image; ?>" alt="<?php echo esc_attr($author_title); ?>">
                                            <h6 class="pt-3 text-center"><?php echo esc_html($author_title); ?></h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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