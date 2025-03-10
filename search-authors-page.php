<?php
/**
 * Template Name: Search Authors Page
 */

get_header();
$args = array(
    'post_type'         =>      'authors',
    'posts_per_page'    =>      -1,
    'order'             =>      'DSC',
    'orderby'           =>      'date',
);
$query = new WP_Query($args);
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
                        <span class="en-bold"><?php echo the_title(); ?></span>
                        <span class="ar-bold"><?php echo $search_authors_fields['ar_title']; ?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-5 d-lg-flex d-none">
            <?php
                if ( $query -> have_posts() ) :
                    while ( $query -> have_posts() ) : $query -> the_post();
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
                                    echo esc_html($tag->name) '/';
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
        <div class="row justify-content-center d-lg-none d-flex">
            <div class="swiper search-authors-swiper">
                <div class="swiper-wrapper">
                    <?php if ( $query -> have_posts() ) :
                            while ( $query -> have_posts() ) : $query -> the_post();
                                $author_id = get_the_ID();
                                $get_title = get_the_title($author_id);
                                $ar_title = get_field('ar_author_name', $author_id);
                                $tags = get_the_tags($author_id);
                    ?>
                    <div class="swiper-slide text-center mb-4 hovered-single-author">
                        <div class="single-author-block d-flex justify-content-center align-items-center p-4">
                            <div>
                                <img class="d-block w-100" src="<?php echo get_the_post_thumbnail_url($author_id); ?>"
                                    alt="<?php echo $get_title; ?>">
                                <h4 class="ar-bold pt-2"><?php echo $ar_title; ?></h4>
                                <?php if($tags){?>
                                <p class="ar-regular">
                                    <?php
                                    foreach ($tags as $tag) {
                                        echo esc_html($tag->name) '/';
                                    }
                                ?>
                                </p>
                                <?php } ?>
                                <a class="mt-3 view-more-btn en-regular"
                                    href="<?php echo get_permalink($author_id); ?>">View
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
        </div>
        <div class="row py-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row publish-with-us-img justify-content-center">
            <div class="col-7 py-5">
                <a href="http://polybloglb.com">
                    <img class="w-100 d-block"
                        src="https://polybloglb.com/wp-content/uploads/2025/01/publishwithus.png" />
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
    var swiper = new Swiper('.search-authors-swiper', {
        loop: false,
        slidesPerView: 2,
        spaceBetween: 20,
        grid: {
            rows: 2,
            fill: 'row', // Ensures correct row filling (optional)
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                spaceBetween: 10
            },
            // when window width is >= 480px
            480: {
                spaceBetween: 15
            },
            // when window width is >= 640px
            640: {
                spaceBetween: 20
            }
        }
    });
});
</script>
<?php
get_footer();