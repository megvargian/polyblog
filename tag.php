<?php
get_header();

$current_tag = get_queried_object();
$tag_name    = isset($current_tag->name) ? $current_tag->name : '';
$tag_slug    = isset($current_tag->slug) ? $current_tag->slug : '';

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tag_slug__in'   => array($tag_slug),
);
$query        = new WP_Query($args);
$tag_posts    = array();
if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
        array_push($tag_posts, get_the_ID());
    endwhile;
    wp_reset_postdata();
endif;
?>
<section class="single-author-page">
    <div class="container">
        <div class="row pt-2 mb-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row author-title justify-content-center">
            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                <div class="pt-lg-0 pt-sm-4 pt-2">
                    <?php
                        $is_arabic_tag = preg_match('/[\x{0600}-\x{06FF}]/u', $tag_name);
                    ?>
                    <h1 class="text-center <?php echo $is_arabic_tag ? 'ar-bold' : 'en-bold'; ?>">
                        <?php echo esc_html($tag_name); ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row text-left mt-4 mb-5 bg-black-sec mx-lg-0 mx-1">
            <div class="col-6 text-left">
                <h2 class="en-bold">
                    Articles
                </h2>
            </div>
            <div class="col-6 text-right">
                <h2 class="ar-bold">
                    مقالات
                </h2>
            </div>
        </div>
        <div class="row">
            <?php if ( ! empty($tag_posts) ) :
                foreach ($tag_posts as $article_id) {
                    $article_link  = get_permalink($article_id);
                    $article_title = get_the_title($article_id);
                    $get_image     = get_field('article_thumbnail', $article_id) != '' ? get_field('article_thumbnail', $article_id) : get_the_post_thumbnail_url($article_id);
                    $get_excerpt   = get_the_excerpt($article_id);
                    $is_arabic     = preg_match('/[\x{0600}-\x{06FF}]/u', $article_title);
                    $text_dir      = $is_arabic ? 'rtl' : 'ltr';
                    $align_class   = $is_arabic ? 'text-right' : 'text-left';
                    $font_class    = $is_arabic ? 'ar-regular' : 'en-regular';
                    $is_youtube_video = get_field('youtube_url', $article_id);
            ?>
            <div class="col-12 mb-5">
                <div class="authors-article">
                    <div class="row px-lg-5 px-3 py-3">
                        <div class="col-5">
                            <a class="<?php echo $is_youtube_video ? 'w-100 h-100 position-relative' : ''; ?> " href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : esc_url($article_link); ?>">
                                <?php if($is_youtube_video) : ?>
                                    <svg id="Layer_1" class="play-icon position-absolute" alt="play" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 449.9 500">
                                        <defs>
                                            <style>
                                            .st0 {
                                                fill: #fff;
                                            }
                                            </style>
                                        </defs>
                                        <path class="st0" d="M81.5,11.05C36.54-14.83,0,6.32,0,58.23v382.88c0,51.93,36.54,73.05,81.5,47.26l334.67-191.96c44.98-25.79,44.98-67.68,0-93.49L81.5,11.05ZM81.5,11.05"/>
                                    </svg>
                                <?php endif; ?>
                                <img class="d-block w-100" src="<?php echo esc_url($get_image); ?>"
                                    alt="<?php echo esc_attr($article_title); ?>">
                            </a>
                        </div>
                        <div class="col-7 d-flex justify-content-center align-items-center">
                            <div class="<?php echo $align_class; ?>" dir="<?php echo $text_dir; ?>">
                                <h3 class="<?php echo $font_class; ?> mb-3">
                                    <a href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : esc_url($article_link); ?>">
                                        <?php echo esc_html($article_title); ?>
                                    </a>
                                </h3>
                                <p class="<?php echo $font_class; ?> mb-5">
                                    <?php echo wp_trim_words($get_excerpt, 30, '...'); ?>
                                </p>
                                <a class="en-regular read-more" href="<?php echo $is_youtube_video ? esc_url($is_youtube_video) : esc_url($article_link); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            else : ?>
            <div class="col-12 text-center py-5">
                <p class="en-regular">No articles found for this tag.</p>
            </div>
            <?php endif; ?>
        </div>
        <div class="row py-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row publish-with-us-img justify-content-center">
            <div class="col-7 py-5">
                <a href="http://polybloglb.com/#contact-us-section">
                    <img class="w-100 d-block"
                        src="https://polybloglb.com/wp-content/uploads/2026/06/publish-with-us.jpg.jpeg" />
                </a>
            </div>
        </div>
        <div class="row pt-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
