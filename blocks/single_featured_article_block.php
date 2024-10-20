<?php
/**
 * HomePage Single Featured Article Block Template
 */

$featured_article_block = get_field('select_article');

$title = get_the_title($selected_post_id);
$article_link = get_permalink($selected_post_id);
$tags = get_the_tags($selected_post_id);
$categories = get_the_category($selected_post_id);
$author = get_field( 'author_field', $selected_post_id );
$thumbnail = get_field( 'thumbnail_field', $selected_post_id )
?>
<section class="">
        <h1><?php echo $title ?></h1>
</section>