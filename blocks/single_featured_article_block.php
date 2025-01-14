<?php
/**
 * HomePage Single Featured Article Block Template
 */

$featured_articles = get_field('featured_articles');

if ($featured_articles): ?>
    <section id="home-featured-articles-desktop" class="d-lg-block d-none">
        <div class="container-fluid">
            <div class="row featured-articles-container">
                <?php foreach ($featured_articles as $featured_article):
                    $article = $featured_article['article'];
                    $title = get_the_title($article);
                    $article_link = get_permalink($article);
                    $tags = get_the_tags($article);
                    $categories = get_the_category($article);
                    $author_name = get_the_title(get_field('author', $article));
                    $thumbnail = get_field('article_thumbnail', $article);
                    ?>
                    <div class="col-12">
                        <div class="row single-featured-article-container ar-bold">
                            <div class="col-5">
                                <a href="<?php echo esc_url($article_link); ?>">
                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>" />
                                </a>
                            </div>
                            <div class="col-7 p-5 right-container">
                                <div class="categories">
                                    <?php if ($categories) {
                                        foreach ($categories as $category) { ?>
                                            <span class="category">
                                                <?php echo esc_html($category->name); ?>
                                            </span>
                                        <?php }
                                    } ?>
                                </div>
                                <div class="title align-text-arabic">
                                    <a href="<?php echo esc_url($article_link); ?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                </div>
                                <div class="author-tags">
                                    <div class="author">
                                        <p><?php echo esc_html($author_name); ?></p>
                                    </div>
                                    <div class="tags">
                                        <?php if ($tags) {
                                            foreach ($tags as $tag) {
                                                echo esc_html($tag->name) . ' ';
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section id="home-featured-articles-mobile" class="d-block d-lg-none">
        <div class="swiper swiper-featured-articles-block py-3 py-sm-4">
            <div class="swiper-wrapper">
                <?php foreach ($featured_articles as $featured_article) {
                    $article = $featured_article['article'];
                    $title = get_the_title($article);
                    $article_link = get_permalink($article);
                    $tags = get_the_tags($article);
                    $categories = get_the_category($article);
                    $author_name = get_the_title(get_field('author', $article));
                    $thumbnail = get_field('article_thumbnail', $article);
                    ?>
                    <div class="swiper-slide">
                        <div class="row single-featured-article-container py-4">
                            <div class="col-5">
                                <a class="position-relative" href="<?php echo esc_url($article_link); ?>">
                                    <img class="d-block" src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>" />
                                    <div class="categories-mobile d-lg-none d-flex">
                                        <?php if ($categories) {
                                            foreach ($categories as $category) { ?>
                                                <span class="category mx-1">
                                                    <?php echo esc_html($category->name) === 'ENGLISH' ? substr($category->name, 0, 2) : mb_substr($category->name, 0, 1, "UTF-8"); ?>
                                                </span>
                                            <?php }
                                        } ?>
                                    </div>
                                </a>
                            </div>
                            <div class="col-7 right-container">
                                <div class="categories d-lg-flex d-none">
                                    <?php if ($categories) {
                                        foreach ($categories as $category) { ?>
                                            <span class="category">
                                                <?php echo esc_html($category->name); ?>
                                            </span>
                                        <?php }
                                    } ?>
                                </div>
                                <div class="title align-text-arabic">
                                    <a class="d-none d-lg-block" href="<?php echo esc_url($article_link); ?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                    <a class="d-block d-lg-none" href="<?php echo esc_url($article_link); ?>">
                                        <?php echo trim_words_with_limits(get_the_excerpt($article), 25); ?>
                                    </a>
                                    <a class="read-more-btn d-block d-lg-none" href="<?php echo esc_url($article_link); ?>">
                                        read more
                                    </a>
                                </div>
                                <div class="author-tags d-lg-flex d-none">
                                    <div class="author">
                                        <p><?php echo esc_html($author_name); ?></p>
                                    </div>
                                    <div class="tags">
                                        <?php if ($tags) {
                                            foreach ($tags as $tag) {
                                                echo esc_html($tag->name) . ' ';
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <div class="container d-lg-none d-flex">
        <div class="row">
            <div class="white-line"></div>
        </div>
    </div>
<script>
	jQuery(document).ready(function ($) {
        var swiper = new Swiper('.swiper-featured-articles-block', {
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
            },
        });
        function isArabic(text) {
            // Regular expression for Arabic characters
            const arabicRegex = /[\u0600-\u06FF]/;
            // Regular expression for English characters
            const englishRegex = /[A-Za-z]/;

            if (arabicRegex.test(text)) {
                return true;
            } else if (englishRegex.test(text)) {
                return false;
            } else {
                return false;
            }
        }
        // add class depending on innerText from .category class
        const texts = $(".category");
        for(let i=0; i<texts.length; i++){
            if(isArabic(texts[i].innerText)){
                $(texts[i]).addClass('ar-regular');
                console.log(`The detected language is: ${texts[i]}`);
            } else {
                $(texts[i]).addClass('en-regular');
            }
        }
        });
</script>
<?php endif; ?>