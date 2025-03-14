<?php

/**
 * HomePage Three Featured Articles Block Template
 * gets latest 3 published posts
 */

$args = array(
    'post_type' => 'post',
    'posts_per_page' => !isMob() ? 3 : 6,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
);

$query = new WP_Query($args);
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
$three_feature_article_block_fields = get_fields();
$all_articles = $three_feature_article_block_fields['articles'];
$first_three_articles = array_slice($all_articles, 0, 3);
?>
<section id="three-featured-articles-block" class="my-5 pb-sm-0 pb-5 three-featured-articles-block-container">
    <div class="container d-none d-lg-block">
        <div class="row position-relative z-1 custom-desktop-padding">
            <?php
            $count = 0;
                foreach ($first_three_articles as $key => $article) {
                    $post_id = $article['article'];
                    $article_title = get_the_title($post_id);
                    $article_link = get_permalink($post_id);
                    $categories = get_the_category($post_id);
                    $article_thumbnail = get_field('article_thumbnail', $post_id);
                    $translations = get_translations($post_id);
                    $count++;
                    $get_first_category_id = $categories[0] -> term_id;
                    $get_fields_cat = get_fields('category_' .$get_first_category_id);
            ?>
                    <div class="col-4 p-1 bg-gray">
                        <a class="article-container w-100 d-block <?php echo $count == 2 ? 'hovered' : ''; ?>" href="<?php echo $article_link; ?>" target="_blank" disabled>
                            <div class="hover-cat">
                                <div class="cat">
                                    <span class="en-bold"><?php echo $get_fields_cat['en_title']; ?></span>
                                    <span class="ar-regular"><?php echo $get_fields_cat['ar_title']; ?></span>
                                </div>
                                <div class="categories d-sm-flex d-none">
                                    <?php
                                        if ($translations) {
                                            foreach ($translations as $lang) {
                                                $translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
                                                if ($translated_id) {
                                        ?>
                                                <span class="category <?php echo $lang['code'] . '-regular'; ?>">
                                                    <?php echo esc_html($lang['code'] == 'en' ? 'EN' : 'ع'); ?>
                                                </span>
                                        <?php }
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <img class="d-block w-100" src="<?php echo $article_thumbnail; ?>" alt="<?php echo $article_title; ?>">
                            <div class="hover-text">
                                <p>
                                    <?php echo $article_title; ?>
                                </p>
                            </div>
                            <div class="hover-cat hover-cat-bottom justify-content-end d-sm-none d-flex">
                                <div class="categories">
                                    <?php
                                        if ($translations) {
                                            foreach ($translations as $lang) {
                                                $translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
                                                if ($translated_id) {
                                        ?>
                                                <span class="category <?php echo $lang['code'] . '-regular'; ?>">
                                                    <?php echo esc_html($lang['code'] == 'en' ? 'EN' : 'ع'); ?>
                                                </span>
                                        <?php }
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
        </div>
    </div>
    <div class="container d-lg-none d-block">
        <div class="row position-relative">
            <div class="swiper three-featured-articles-block-swiper" style="padding: 7rem 0;">
                <div class="swiper-wrapper">
                    <?php
                    $count = 0;
                    foreach ($all_articles as $key => $article) {
                            $post_id = $article['article'];
                            $article_title = get_the_title($post_id);
                            $article_link = get_permalink($post_id);
                            $categories = get_the_category($post_id);
                            $article_thumbnail = get_field('article_thumbnail', $post_id);
                            $count++;
                            $translations = get_translations($post_id);
                            $get_first_category_id = $categories[0] -> term_id;
                            $get_fields_cat = get_fields('category_' .$get_first_category_id);
                    ?>
                            <div class="swiper-slide p-1 bg-gray">
                                <a class="article-container w-100 d-block <?php echo $count == 2 ? 'hovered' : ''; ?>" href="<?php echo $article_link; ?>" target="_blank" disabled>
                                    <div class="hover-cat">
                                        <div class="cat">
                                            <span class="en-bold"><?php echo $get_fields_cat['en_title']; ?></span>
                                            <span class="ar-regular"><?php echo $get_fields_cat['ar_title']; ?></span>
                                        </div>
                                        <div class="categories d-sm-flex d-none">
                                            <?php
                                            if ($translations) {
                                                foreach ($translations as $lang) {
                                                    $translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
                                                    if ($translated_id) {
                                            ?>
                                                    <span class="category <?php echo $lang['code'] . '-regular'; ?>">
                                                        <?php echo esc_html($lang['code'] == 'en' ? 'EN' : 'ع'); ?>
                                                    </span>
                                            <?php }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <img class="d-block w-100" src="<?php echo $article_thumbnail; ?>" alt="<?php echo $article_title; ?>">
                                    <div class="hover-text">
                                        <p>
                                            <?php echo $article_title; ?>
                                        </p>
                                    </div>
                                    <div class="hover-cat hover-cat-bottom justify-content-end d-sm-none d-flex">
                                        <div class="categories">
                                            <?php
                                            if ($translations) {
                                                foreach ($translations as $lang) {
                                                    $translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
                                                    if ($translated_id) {
                                            ?>
                                                        <span class="category <?php echo $lang['code'] . '-regular'; ?>">
                                                            <?php echo esc_html($lang['code'] == 'en' ? 'EN' : 'ع'); ?>
                                                        </span>
                                            <?php }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                </div>
            </div>
            <div class="swiper-button-prev swiper-button-prev-last-part-three-featured-articles-block"></div>
            <div class="swiper-button-next swiper-button-next-last-part-three-featured-articles-block"></div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function($) {
        var swiper = new Swiper('.three-featured-articles-block-swiper', {
            loop: true,
            centeredSlides: true,
            slidesPerView: 3,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
                nextEl: '.swiper-button-next-last-part-three-featured-articles-block',
                prevEl: '.swiper-button-prev-last-part-three-featured-articles-block',
            },
        });
        <?php if (!$isMob) { ?>
            $('.article-container').hover(
                function() {
                    $('.article-container').removeClass('hovered');
                    $(this).addClass('hovered'); // Add class on hover
                    $(this).find('.position-relative').attr('disabled', false);
                },
                function() {
                    $(this).removeClass('hovered'); // Remove class when mouse leaves
                    $(this).find('.position-relative').attr('disabled', true);
                }
            );
        <?php } ?>
    });
</script>