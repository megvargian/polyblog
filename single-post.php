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
$author_id = get_field('author');
$author_name = get_the_title($author_id);
$author_image = get_field('author_profile', $author_id);
$author_link = get_permalink($author_id);
$tags = get_the_tags();

if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <?php if (has_post_thumbnail()): ?>
            <div class="single-post-featured-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <div class="container-fluid px-4 single-post-container">
            <div class="row py-2">
                <div class="col-5 d-none d-sm-block"></div>
                <div class="col-12 col-sm-4 mb-2">
                    <button class="what-we-think btn btn-primary w-100">What we think</button>
                </div>
                <div class="col-12 col-sm-3 category-buttons">
                    <button class="english">ENGLISH</button>
                    <button class="arabic">عربي</button>
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    <h1 class="align-text-arabic"><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row py-2 article-info">
                <div class="col-5"></div>
                <div class="col-4">
                    <?php
                    echo '<p>Published on: ' . get_the_date('d/m/Y') . ' ' . get_the_time('g:i A') . '</p>';
                    ?>
                </div>
                <div class="col-3 tags">
                    <p> <?php foreach ($tags as $tag) { ?>
                            <?php echo "#" . esc_html($tag->name); ?>
                        <?php } ?>
                    </p>
                </div>
            </div>
            <div class="row py-2 main-content">
                <div class="col-5 author-info">
                    <img class="author-image" src="<?php echo $author_image ?>" alt="<?php echo $author_title ?>" />
                    <h2><?php echo $author_name; ?></h2>
                    <a class="author-button" href="<?php echo $author_link; ?>" target="_blank">View profile</a>
                </div>
                <div class="col-7 align-text-arabic">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile;
endif;
?>
<?php
get_footer();
