<?php
/**
 * HomePage Single Featured Article Block Template
 */

$featured_articles = get_field('featured_articles');

if ($featured_articles): ?>
    <section id="home-featured-articles-desktop" class="d-sm-block d-none">
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
                                        <span class="category ar-regular">
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
    </section>
    <section id="home-featured-articles-mobile" class="d-block d-sm-none">
        <div class="swiper swiper-featured-articles-block">
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
                        <div class="row single-featured-article-container">
                            <div class="col-5">
                                <a href="<?php echo esc_url($article_link); ?>">
                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>" />
                                </a>
                            </div>
                            <div class="col-7 right-container">
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
                    <?php

                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <script>
            jQuery(document).ready(function ($) {
                var swiper = new Swiper('.swiper-featured-articles-block', {
                    slidesPerView: 1,
                    pagination: {
                        el: '.swiper-pagination',
                    },
                });
            });
        </script>
    </section>
<?php endif; ?>