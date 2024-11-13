<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<div class="container">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <?php if (has_post_thumbnail()): ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <div>
                <?php the_content(); ?>
            </div>
        <?php endwhile;
    endif;
    ?>
</div>
<?php
get_footer();
