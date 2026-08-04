<?php
get_header();
$category_id = get_queried_object_id();
$cat_fields = get_fields('category_' . $category_id);

// Build a cross-language query: collect every WPML translation of this category term.
$_cat_trid = apply_filters('wpml_element_trid', null, $category_id, 'tax_category');
$_cat_ids  = array($category_id);
if ($_cat_trid) {
    $_cat_xlations = apply_filters('wpml_get_element_translations', null, $_cat_trid, 'tax_category');
    if (is_array($_cat_xlations)) {
        foreach ($_cat_xlations as $_xl) {
            if (!empty($_xl->element_id)) $_cat_ids[] = (int) $_xl->element_id;
        }
    }
}
$cat_query = new WP_Query(array(
    'post_type'        => 'post',
    'post_status'      => 'publish',
    'posts_per_page'   => -1,
    'category__in'     => array_unique($_cat_ids),
    'suppress_filters' => true,
    'orderby'          => 'date',
    'order'            => 'DESC',
));
?>
<div class="container how-we-see-it-container">
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
        action="<?php echo esc_url(home_url('/category/how-we-see-it/')); ?>">
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
        <input type="hidden" name="cat" value="how-we-see-it" />
    </form>
    <div class="category-posts">
        <?php if ($cat_query->have_posts()) : ?>
        <?php $cat_post_count = 0; ?>
        <div class="row my-4 desktop">
            <?php while ($cat_query->have_posts()) : $cat_query->the_post(); $cat_post_count++; ?>
            <?php
                            $post_id = get_the_ID();
                            $post_title = get_the_title($post_id);
                            $is_arabic = (bool) preg_match('/[\x{0600}-\x{06FF}]/u', $post_title);
                            $content_dir = $is_arabic ? 'rtl' : 'ltr';
                            $text_align  = $is_arabic ? 'text-right' : 'text-left';
                            $article_thumbnail = get_field('article_thumbnail');
                            $languages = get_translations($post_id);
                            $tags = get_the_tags($post_id);
                            $is_youtube_video = get_field('youtube_url', $post_id);
                        ?>
            <div class="category-card-desktop col-md-6 my-2<?php echo $cat_post_count > 6 ? ' cat-post-hidden' : ''; ?>">
                <div class="card" dir="<?php echo $content_dir; ?>">
                    <?php if ($article_thumbnail) : ?>
                    <div class="card-img-top <?php echo $is_youtube_video ? 'position-relative' : ''; ?>">
                        <a href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : esc_url(get_permalink()); ?>">
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
                                    <h3 class="<?php echo $text_align; ?>"><?php echo esc_html($post_title); ?></h3>
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
                                                <h5 class="<?php echo $text_align; ?>">
                                                    <strong><?php echo get_the_title($author); ?></strong>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                    <?php if($tags){ ?>
                                    <div class="row">
                                        <div class="col">
                                            <p class="tags <?php echo $text_align; ?>">
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
        <?php if ($cat_post_count > 6) : ?>
        <div class="row my-4 text-center load-more-container desktop">
            <div class="col">
                <button class="load-more-btn">Load More</button>
            </div>
        </div>
        <?php endif; ?>
        <?php $cat_query->rewind_posts(); ?>
        <div class="row my-4 mobile">
            <div class="col">
                <div class="swiper mySwiper" style="overflow: hidden !important;">
                    <div class="swiper-wrapper">
                        <?php while ($cat_query->have_posts()) : $cat_query->the_post();
                                        $post_id = get_the_ID();
                                        $post_title = get_the_title($post_id);
                                        $is_arabic = (bool) preg_match('/[\x{0600}-\x{06FF}]/u', $post_title);
                                        $content_dir = $is_arabic ? 'rtl' : 'ltr';
                                        $text_align  = $is_arabic ? 'text-right' : 'text-left';
                                        $article_thumbnail = get_field('article_thumbnail');
                                        $languages = get_translations($post_id);
                                        $is_youtube_video = get_field('youtube_url', $post_id);
                                ?>
                        <div class="category-card-mobile swiper-slide">
                            <div class="card" dir="<?php echo $content_dir; ?>">
                                <?php if ($article_thumbnail) : ?>
                                <div class="card-img-top <?php echo $is_youtube_video ? 'position-relative' : ''; ?>">
                                    <a href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : esc_url(get_permalink()); ?>">
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
                                            <h3 class="<?php echo $text_align; ?>"><?php echo esc_html(trim_words_with_limits($post_title)); ?></h3>
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
                                            <p class="article-date">
                                                <?php echo get_the_date('d/m/Y'); ?>
                                            </p>
                                        </div>
                                        <?php
                                                $author = get_field('author');
                                                ?>
                                        <div class="col-5 author-info">
                                            <a href="<?php echo get_permalink($author); ?>">
                                                <h6 class="<?php echo $text_align; ?>">
                                                    <strong><?php echo get_the_title($author); ?></strong>
                                                </h6>
                                            </a>
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
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
<script>
document.getElementById('searchButton').addEventListener('click', function() {
    document.querySelector('.search-form').submit();
});

(function() {
    var btn = document.querySelector('.load-more-btn');
    if (!btn) return;
    btn.addEventListener('click', function() {
        var hidden = document.querySelectorAll('.cat-post-hidden');
        Array.from(hidden).slice(0, 6).forEach(function(el) {
            el.classList.remove('cat-post-hidden');
        });
        if (!document.querySelector('.cat-post-hidden')) btn.style.display = 'none';
    });
})();

const swiper = new Swiper(".mySwiper", {
    effect: "cards",
    grabCursor: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>