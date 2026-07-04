<?php
/**
 * Template Name: Search Authors Page
 */

get_header();
$desktop_args = array(
    'post_type'         =>      'authors',
    'posts_per_page'    =>      -1,
    'order'             =>      'DESC',
    'orderby'           =>      'date',
);
$desktop_query = new WP_Query($desktop_args);

$mobile_posts_per_page = 4;
$mobile_args = array(
    'post_type'         =>      'authors',
    'posts_per_page'    =>      $mobile_posts_per_page,
    'order'             =>      'DESC',
    'orderby'           =>      'date',
);
$mobile_query = new WP_Query($mobile_args);
$mobile_total_authors = (int) $mobile_query->found_posts;
$mobile_loaded_authors = (int) $mobile_query->post_count;
$search_authors_fields = get_fields();
?>
<section class="search-authors-page">
    <div class="container">
        <div class="row pt-2 mb-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row text-center py-5">
            <div class="col-12">
                <div class="bg-black">
                    <h1>
                        <span class="en-bold"><?php echo esc_html(get_the_title()); ?></span>
                        <span class="ar-bold"><?php echo $search_authors_fields['ar_title']; ?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-5 d-lg-flex d-none">
            <?php
                if ( $desktop_query -> have_posts() ) :
                    while ( $desktop_query -> have_posts() ) : $desktop_query -> the_post();
                    $author_id = get_the_ID();
                    $get_title = get_the_title($author_id);
                    $ar_title = get_field('ar_author_name', $author_id);
                    $tags = get_the_tags($author_id);

            ?>
            <div class="col-4 text-center mb-4 hovered-single-author">
                <div class="single-author-block d-flex justify-content-center align-items-center p-4">
                    <div>
                        <img class="d-block w-100" src="<?php echo get_the_post_thumbnail_url($author_id); ?>"
                            alt="<?php echo $get_title; ?>">
                        <h4 class="ar-bold pt-2"><?php echo $ar_title; ?></h4>
                        <?php if($tags){?>
                        <p class="ar-regular">
                            <?php
                                foreach ($tags as $tag) {
                                    echo esc_html($tag->name) .'/';
                                }
                            ?>
                        </p>
                        <?php } ?>
                        <a class="mt-3 view-more-btn en-regular" href="<?php echo get_permalink($author_id); ?>">View
                            Profile</a>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();// Restore original Post Data
                endif;
            ?>
        </div>
        <div class="row justify-content-center d-lg-none d-flex pt-3">
            <div class="col-12" id="search-authors-mobile-list">
                <?php if ( $mobile_query -> have_posts() ) :
                        while ( $mobile_query -> have_posts() ) : $mobile_query -> the_post();
                            $author_id = get_the_ID();
                            $get_title = get_the_title($author_id);
                            $ar_title = get_field('ar_author_name', $author_id);
                            $tags = get_the_tags($author_id);
                ?>
                <div class="text-center mb-4 hovered-single-author">
                    <div class="single-author-block d-flex justify-content-center align-items-center p-4">
                        <div>
                            <img class="d-block w-100" src="<?php echo get_the_post_thumbnail_url($author_id); ?>"
                                alt="<?php echo esc_attr($get_title); ?>">
                            <h4 class="ar-bold pt-2"><?php echo esc_html($ar_title); ?></h4>
                            <?php if($tags){?>
                            <p class="ar-regular">
                                <?php
                                foreach ($tags as $tag) {
                                    echo esc_html($tag->name) . '/';
                                }
                            ?>
                            </p>
                            <?php } ?>
                            <a class="mt-3 view-more-btn en-regular" href="<?php echo get_permalink($author_id); ?>">View
                                Profile</a>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();// Restore original Post Data
                endif;
                ?>
            </div>
        </div>
        <?php if ($mobile_total_authors > $mobile_loaded_authors) : ?>
        <div class="row d-lg-none d-flex pb-4">
            <div class="col-12 text-center">
                <button id="search-authors-load-more" class="search-authors-load-more en-regular"
                    data-offset="<?php echo esc_attr($mobile_loaded_authors); ?>"
                    data-total="<?php echo esc_attr($mobile_total_authors); ?>">Load More</button>
            </div>
        </div>
        <?php endif; ?>
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
<script>
jQuery(document).ready(function($) {
    $('#search-authors-load-more').on('click', function() {
        const button = $(this);
        const offset = parseInt(button.data('offset'), 10) || 0;
        const total = parseInt(button.data('total'), 10) || 0;

        button.prop('disabled', true).text('Loading...');

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'search_authors_load_more',
                offset: offset
            },
            success: function(response) {
                if (response && response.success && response.data && response.data.html) {
                    $('#search-authors-mobile-list').append(response.data.html);

                    const newlyLoaded = parseInt(response.data.count, 10) || 0;
                    const updatedOffset = offset + newlyLoaded;
                    button.data('offset', updatedOffset);

                    if (!newlyLoaded || updatedOffset >= total) {
                        button.hide();
                        return;
                    }
                } else {
                    button.hide();
                    return;
                }

                button.prop('disabled', false).text('Load More');
            },
            error: function() {
                button.prop('disabled', false).text('Load More');
            }
        });
    });
});
</script>
<?php
get_footer();