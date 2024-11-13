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
    while (have_posts()):
        the_post();
    endwhile;
    ?>
    <div>
        testing single post type
    </div>
</div>
<?php
get_footer();
