<?php
get_header();
$category_id = get_queried_object_id();
$cat_fields = get_fields('category_' . $category_id);
?>
<div class="container what-we-think-container">
    <div class="row text-center py-5">
        <div class="col-12">
            <div class="main-header-cat">
                <h1>
                    <span class="en-bold"><?php echo $cat_fields['en_title']; ?></span>
                    <span class="ar-bold"><?php echo $cat_fields['ar_title']; ?></span>
                </h1>
            </div>
        </div>
    </div>
    <form role="search" method="get" class="search-form desktop"
        action="<?php echo esc_url(home_url('/category/what-we-think/')); ?>">
        <div class="row my-2">
            <div class="col search-input">
                <div class="div input-with-icon">
                    <input name="s" id="searchInput" placeholder="Search bar" />
                </div>
                <button type="submit" id="searchButton" class="search-btn">
                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.0862 19.1051L25.375 25.375M21.75 12.6875C21.75 17.6925 17.6925 21.75 12.6875 21.75C7.68241 21.75 3.625 17.6925 3.625 12.6875C3.625 7.68241 7.68241 3.625 12.6875 3.625C17.6925 3.625 21.75 7.68241 21.75 12.6875Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
        <input type="hidden" name="cat" value="what-we-think" />
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
                        $tags = get_the_tags($post_id);
                        $is_youtube_video = get_field('youtube_url', $post_id);

                        if ($article_thumbnail) : ?>
                    <div class="card-img-top <?php echo $is_youtube_video ? 'position-relative' : ''; ?>">
                        <a href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : get_permalink(); ?>">
                            <?php if($is_youtube_video) : ?>
                                <svg id="Layer_1" class="play-icon position-absolute" alt="play" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 449.9 500">
                                    <path class="st0" fill="#fff" d="M81.5,11.05C36.54-14.83,0,6.32,0,58.23v382.88c0,51.93,36.54,73.05,81.5,47.26l334.67-191.96c44.98-25.79,44.98-67.68,0-93.49L81.5,11.05ZM81.5,11.05"/>
                                </svg>
                            <?php endif; ?>
                            <img class="thumbnail" src="<?php echo esc_url($article_thumbnail); ?>"
                                alt="<?php echo esc_attr($post_title); ?>" class="img-fluid">
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
                                                <strong>
                                                    <?php echo esc_html($lang['code'] == 'ar' ? 'ع' : 'EN'); ?></strong>
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
                                                <h5 class="align-text-arabic">
                                                    <strong><?php echo get_the_title($author); ?></strong>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                    <?php if($tags){ ?>
                                    <div class="row">
                                        <div class="col">
                                            <p class="tags align-text-arabic">
                                                <?php
                                                    foreach ($tags as $tag) {
                                                        echo esc_html($tag->name) .'/';
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-3">
                                    <img class="author-image" src="<?php echo get_the_post_thumbnail_url($author); ?>"
                                        alt="<?php echo get_the_title($author); ?>" />
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
                <div class="swiper mySwiper" style="overflow: hidden !important;">
                    <div class="swiper-wrapper">
                        <?php while (have_posts()) : the_post(); ?>
                        <div class="category-card-mobile swiper-slide">
                            <div class="card">
                                <?php
                                        $post_id = get_the_ID();
                                        $post_title = get_the_title($post_id);
                                        $article_thumbnail = get_field('article_thumbnail');
                                        $languages = get_translations($post_id);
                                        $is_youtube_video = get_field('youtube_url', $post_id);

                                        if ($article_thumbnail) : ?>
                                <div class="card-img-top <?php echo $is_youtube_video ? 'position-relative' : ''; ?>">
                                    <a href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : get_permalink(); ?>">
                                        <?php if($is_youtube_video) : ?>
                                            <svg id="Layer_1" class="play-icon position-absolute" alt="play" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 449.9 500">
                                                <path class="st0" fill="#fff" d="M81.5,11.05C36.54-14.83,0,6.32,0,58.23v382.88c0,51.93,36.54,73.05,81.5,47.26l334.67-191.96c44.98-25.79,44.98-67.68,0-93.49L81.5,11.05ZM81.5,11.05"/>
                                            </svg>
                                        <?php endif; ?>
                                        <img class="thumbnail" src="<?php echo esc_url($article_thumbnail); ?>"
                                            alt="<?php echo esc_attr($post_title); ?>" class="img-fluid">
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <div class="row article-title">
                                        <div class="col">
                                            <h3><?php echo esc_html(trim_words_with_limits($post_title, 8)); ?></h3>
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
                                                    <button
                                                        class="<?php echo $lang['code'] == 'ar' ? 'arabic' : 'english'; ?>">
                                                        <strong>
                                                            <?php echo esc_html($lang['code'] == 'ar' ? 'ع' : 'EN'); ?></strong>
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
                                                        <h6 class="align-text-arabic">
                                                            <strong><?php echo get_the_title($author); ?></strong>
                                                        </h6>
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
                                            <img class="author-image"
                                                src="<?php echo get_the_post_thumbnail_url($author); ?>"
                                                alt="<?php echo get_the_title($author); ?>" />
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