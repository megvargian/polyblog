<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<?php
$post_id = get_the_ID();
$author_post_id = get_field('author');
$author_id = get_post_field('post_author', $author_post_id);
$author_name = get_the_title($author_post_id);
$author_image = get_field('author_profile', $author_post_id);
$author_link = get_permalink($author_post_id);
$categories = get_the_category();
$tags = get_the_tags();

$author_posts_args = array(
    'author' => $author_id,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -3,
    'post__not_in' => array($post_id),
);
$author_posts_query = new WP_Query($author_posts_args);

if (have_posts()):
    while (have_posts()):
        the_post(); ?>
<?php if (has_post_thumbnail()): ?>
<div class="single-post-featured-image">
    <?php the_post_thumbnail('full'); ?>
</div>
<?php endif; ?>
<div class="container-fluid px-4 single-post-container">
    <div class="row py-2 justify-content-end">
        <div class="col-12 col-sm-4 mb-2">
            <button type="button" class="what-we-think w-100">What we think</button>
        </div>
        <div class="col-12 col-sm-3 category-buttons">
            <?php foreach ($categories as $category) { ?>
                <button type="button" class="<?php echo $category->name == 'ENGLISH' ? 'english' : 'arabic'; ?>">
                    <?php echo esc_html($category->name); ?>
                </button>
            <?php } ?>
        </div>
    </div>
    <div class="row py-2">
        <div class="col">
            <h1 class="align-text-arabic"><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row py-2 main-content">
        <div class="col-12 col-lg-4 py-2 author-info order-lg-1 order-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <img class="author-image" src="<?php echo $author_image ?>" alt="<?php echo $author_title ?>" />
                        <h2><?php echo $author_name; ?></h2>
                        <a class="author-button" href="<?php echo $author_link; ?>" target="_blank">View profile</a>
                    </div>
                </div>
                <div class="row mt-5 mb-2">
                    <div class="col">
                        <p class="what-we-think w-100">Articles written by
                            <?php echo $author_name; ?></p>
                    </div>
                </div>
                <div id="single-post-author-posts">
                    <?php
                            if ($author_posts_query->have_posts()):
                                while ($author_posts_query->have_posts()):
                                    $author_posts_query->the_post();
                                    $author_post_featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                    $author_post_content_preview = wp_trim_words(get_the_content(), 20, '...');
                                    $author_post_publish_date = get_the_date('M. j, Y');
                                    ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <div class="row my-2 p-4 author-post-container align-text-arabic">
                            <div class="col author-post-thumbnail-container">
                                <img src="<?php echo esc_url($author_post_featured_image); ?>" />
                            </div>
                            <div class="col author-post-details-container">
                                <div class="row">
                                    <div class="col">
                                        <p class="title"><?php the_title(); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="preview"><?php echo esc_html($author_post_content_preview); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col details-container">
                                        <small><?php echo $author_name; ?></small>
                                        <small><?php echo esc_html($author_post_publish_date); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                                endwhile;
                            else:
                                echo '<p>No other posts</p>';
                            endif;

                            wp_reset_postdata();
                            ?>
                </div>
                <div class="row">
                    <div class="col">
                        <button id="single-post-load-more" data-offset="3">
                            view more
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/caret-down.svg"
                                alt="view more" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 py-2 align-text-arabic order-lg-2 order-1">
            <div class="row py-2 article-info">
                <div class="col-6 d-flex justify-content-start">
                    <?php
                        echo '<p>Published on: ' . get_the_date('d/m/Y') . ' ' . get_the_time('g:i A') . '</p>';
                    ?>
                </div>
                <div class="col-6 tags">
                    <p> <?php foreach ($tags as $tag) { ?>
                        <?php echo "#" . esc_html($tag->name); ?>
                        <?php } ?>
                    </p>
                </div>
            </div>
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php
        $total_posts_query = new WP_Query(array(
            'author' => $author_id,
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));

        if ($total_posts_query->have_posts()):
            $total_posts = $total_posts_query->found_posts;
        endif;
        ?>
<script>
jQuery(document).ready(function($) {
    let authorPostsCount = 3;

    $('#single-post-load-more').on('click', function() {
        const button = $(this);
        const offset = button.data('offset');
        const currentPostId = <?php echo get_the_ID(); ?>;

        function countOccurrences(string, substring) {
            const matches = string.match(new RegExp(substring, 'g'));
            return matches ? matches.length : 0;
        }

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'single_post_load_more_posts',
                offset: offset,
                current_post_id: currentPostId,
            },
            success: function(response) {
                if (response) {
                    let totalPosts = <?php echo $total_posts; ?>;
                    $('#single-post-author-posts').append(response);
                    button.data('offset', offset + 3);

                    const numberOfPostsLoaded = countOccurrences(response,
                        'author-post-details-container');
                    authorPostsCount += numberOfPostsLoaded;

                    if (authorPostsCount === totalPosts - 1) {
                        button.hide();
                    }
                }
            }
        });
    });
});
</script>
<?php endwhile;
endif;
?>
<?php
get_footer();