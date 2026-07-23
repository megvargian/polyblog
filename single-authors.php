<?php
get_header();
$get_all_single_authors_fields = get_fields();
$author_id = get_the_ID();
// get all articles assign to this author
$args = array(
    'post_type'         =>      'post',
    'posts_per_page'    =>      -1,
    'order'             =>      'DSC',
    'orderby'           =>      'date',
);
$query = new WP_Query($args);
$current_author_posts = array();
if ( $query -> have_posts() ) :
    while ( $query -> have_posts() ) : $query -> the_post();
        $post_custom_fields = get_fields(get_the_ID());
        if($post_custom_fields['author'] == $author_id ):
            array_push($current_author_posts, get_the_ID());
        endif;
    endwhile;
    wp_reset_postdata();// Restore original Post Data
endif;
?>
<section class="single-author-page">
    <div class="container">
        <div class="row pt-2 mb-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row text-left py-5">
            <div class="col-12">
                <div class="bg-black">
                    <h2>
                        <span class="en-bold"><?php echo $get_all_single_authors_fields['en_page_title']; ?></span>
                        <span class="ar-bold"><?php echo $get_all_single_authors_fields['ar_page_title']; ?></span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row author-title">
            <div class="col-lg-4 col-12 px-md-0 px-5">
                <img class="d-block single-article-img"
                    src="<?php echo get_the_post_thumbnail_url($author_id) ? get_the_post_thumbnail_url($author_id) : get_template_directory_uri() . '/inc/assets/images/demo-profile.png'; ?>"
                    alt="<?php echo $get_all_single_authors_fields['author_title']; ?>">
            </div>
            <div class="col-lg-7 col-12 text-left justify-content-center d-flex align-items-center">
                <div class="pt-lg-0 pt-sm-4 pt-2">
                    <h1 class="text-lg-left text-center">
                        <span class="en-bold d-block">
                            <?php the_title(); ?>
                        </span>
                        <span class="ar-bold d-block">
                            <?php echo $get_all_single_authors_fields['ar_author_name']; ?>
                        </span>
                    </h1>
                    <p class="en-regular mt-2"><?php echo $get_all_single_authors_fields['author_title']; ?></p>
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
            <?php foreach ($current_author_posts as $article_id) {
                    $article_link = get_permalink($article_id);
                    $article_title = get_the_title($article_id);
                    $get_image = get_field('article_thumbnail', $article_id) != '' ? get_field('article_thumbnail', $article_id) : get_the_post_thumbnail_url($article_id);
                    $get_excerpt = get_the_excerpt($article_id);
                    $is_arabic = preg_match('/[\x{0600}-\x{06FF}]/u', $get_excerpt);
                    $is_youtube_video = get_field('youtube_url', $article_id);
                    $target_url = $is_youtube_video ? esc_url($is_youtube_video) : esc_url($article_link);
                    $link_target = $is_youtube_video ? ' target="_blank" rel="noopener noreferrer"' : '';

            ?>
            <div class="col-12 mb-5">
                <div class="authors-article">
                    <div class="row px-lg-5 px-3 py-3">
                        <div class="col-5">
                            <a class="position-relative d-block" href="<?php echo $target_url; ?>"<?php echo $link_target; ?>>
                                <img class="d-block w-100" src="<?php echo esc_url($get_image); ?>"
                                    alt="<?php echo esc_attr($article_title); ?>">
                                <?php if ($is_youtube_video) : ?>
                                    <svg id="Layer_1" class="play-icon position-absolute" alt="play" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 449.9 500">
                                        <path class="st0" fill="#fff" d="M81.5,11.05C36.54-14.83,0,6.32,0,58.23v382.88c0,51.93,36.54,73.05,81.5,47.26l334.67-191.96c44.98-25.79,44.98-67.68,0-93.49L81.5,11.05ZM81.5,11.05"/>
                                    </svg>
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="col-7 d-flex justify-content-center align-items-center">
                            <div class="text-<?php echo $is_arabic ? 'right' : 'left'; ?>" dir="<?php echo $is_arabic ? 'rtl' : 'ltr'; ?>">
                                <a class="<?php echo $is_arabic ? 'ar-regular' : 'en-regular'; ?> mb-5 d-block text-decoration-none text-white"
                                    href="<?php echo $target_url; ?>"<?php echo $link_target; ?>>
                                    <?php echo esc_html($get_excerpt); ?>
                                </a>
                                <a class="en-regular" href="<?php echo $target_url; ?>"<?php echo $link_target; ?>>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
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