<?php get_header(); ?>
<div class="container how-we-see-it-container">
    <div class="row desktop">
        <div class="col">
            <img class="header" src="https://polybloglb.com/wp-content/uploads/2025/02/how-we-see-it.png" alt="what we think" />
        </div>
    </div>
    <div class="row mobile">
        <div class="col header">
            <img src="https://polybloglb.com/wp-content/uploads/2025/02/outwriters.png" alt="our writers" />
        </div>
    </div>
    <form role="search" method="get" class="search-form desktop" action="<?php echo esc_url(home_url('/category/how-we-see-it/')); ?>">
        <div class="row my-2">
            <div class="col search-input">
                <div class="div input-with-icon">
                    <input name="s" id="searchInput" placeholder="Search bar" />
                </div>
                <button type="submit" id="searchButton" class="search-btn">
                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.0862 19.1051L25.375 25.375M21.75 12.6875C21.75 17.6925 17.6925 21.75 12.6875 21.75C7.68241 21.75 3.625 17.6925 3.625 12.6875C3.625 7.68241 7.68241 3.625 12.6875 3.625C17.6925 3.625 21.75 7.68241 21.75 12.6875Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
        <input type="hidden" name="cat" value="how-we-see-it" />
    </form>
    <div class="category-posts">
        <?php if (have_posts()) : ?>
            <div class="row my-4 desktop">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="category-card-desktop col-md-6 my-2">
                        <div class="card">
                            <?php
                            $post_id = get_the_ID();
                            $post_title = get_the_title($post_id);
                            $article_thumbnail = get_field('article_thumbnail');
                            $languages = get_translations($post_id);

                            if ($article_thumbnail) : ?>
                                <div class="card-img-top">
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="thumbnail" src="<?php echo esc_url($article_thumbnail); ?>" alt="<?php the_title(); ?>" class="img-fluid">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="card-content">
                                    <div class="row article-title">
                                        <div class="col">
                                            <h3><?php echo esc_html($post_title); ?></h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 category-buttons">
                                            <div class="row">
                                                <div class="col">
                                                    <?php
                                                    if ($languages) {
                                                        foreach ($languages as $lang) {
                                                            $translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
                                                            if ($translated_id) {
                                                    ?>
                                                                <button class="<?php echo $lang['code'] == 'ar' ? 'arabic' : 'english'; ?>">
                                                                    <strong> <?php echo esc_html($lang['code'] == 'ar' ? 'ع' : 'EN'); ?></strong>
                                                                </button>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="article-date">
                                                        <?php echo get_the_date('d/m/Y'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $author = get_field('author');
                                        ?>
                                        <div class="col-5 author-info">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="<?php echo get_permalink($author); ?>">
                                                        <h5 class="align-text-arabic"><strong><?php echo get_the_title($author); ?></strong></h5>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="tags align-text-arabic">tag 1 / tag 2 / tag 3</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <img class="author-image" src="<?php echo get_the_post_thumbnail_url($author); ?>" alt="<?php echo get_the_title($author); ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="row my-4 mobile">
                <div class="col">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="category-card-mobile swiper-slide">
                                    <div class="card">
                                        <?php
                                        $post_id = get_the_ID();
                                        $article_thumbnail = get_field('article_thumbnail');
                                        $languages = get_translations($post_id);

                                        if ($article_thumbnail) : ?>
                                            <div class="card-img-top">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img class="thumbnail" src="<?php echo esc_url($article_thumbnail); ?>" alt="<?php the_title(); ?>" class="img-fluid">
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <div class="row article-title">
                                                <div class="col">
                                                    <h3><?php echo esc_html($post_title); ?></h3>
                                                </div>
                                            </div>
                                            <div class="row card-content">
                                                <div class="col-4 category-buttons">
                                                    <div>
                                                        <?php
                                                        if ($languages) {
                                                            foreach ($languages as $lang) {
                                                                $translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
                                                                if ($translated_id) {
                                                        ?>
                                                                    <button class="<?php echo $lang['code'] == 'ar' ? 'arabic' : 'english'; ?>">
                                                                        <strong> <?php echo esc_html($lang['code'] == 'ar' ? 'ع' : 'EN'); ?></strong>
                                                                    </button>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <p class="article-date">
                                                        <?php echo get_the_date('d/m/Y'); ?>
                                                    </p>
                                                </div>
                                                <?php
                                                $author = get_field('author');
                                                ?>
                                                <div class="col-5 author-info">
                                                    <a href="<?php echo get_permalink($author); ?>">
                                                        <h6 class="align-text-arabic"><strong><?php echo get_the_title($author); ?></strong></h6>
                                                    </a>
                                                </div>
                                                <div class="col-3">
                                                    <img class="author-image" src="<?php echo get_the_post_thumbnail_url($author); ?>" alt="<?php echo get_the_title($author); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
            <?php else : ?>
                <p>No posts found in this category.</p>
            <?php endif; ?>
            </div>
    </div>
</div>
<?php get_footer(); ?>
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        document.querySelector('.search-form').submit();
    });

    const swiper = new Swiper(".mySwiper", {
        effect: "cards",
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>