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
$author_name = get_the_title(get_field('author'));
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
            <div class="row">
                <div class="col">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row tags">
                <div class="col-4"></div>
                <div class="col-4">
                    <?php
                    echo '<p>Published on: ' . get_the_date('d/m/Y') . ' ' . get_the_time('g:i A') . '</p>';
                    ?>
                </div>
                <div class="col-4">
                    <p> <?php foreach ($tags as $tag) { ?>
                            <?php echo "#" . esc_html($tag->name); ?>
                        <?php } ?>
                    </p>
                </div>
            </div>
            <div class="row main-content">
                <div class="col-4">
                        <p><?php echo $author_name; ?></p>
                </div>
                <div class="col-8">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile;
endif;
?>
<?php
get_footer();
