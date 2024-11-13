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
$tags = get_the_tags();

if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <?php if (has_post_thumbnail()): ?>
            <div class="single-post-featured-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <div class="container-fluid single-post-container">
            <div class="row">
                <div class="col">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row tags">
                <div class="col">
                    <?php foreach ($tags as $tag) { ?>
                        <?php echo "#" . esc_html($tag->name); ?>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile;
endif;
?>
<?php
get_footer();
