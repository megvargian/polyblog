<?php
/**
 * HomePage Single Featured Article Block Template
 */

$featured_article_block = get_field('selected_article');

$title = get_the_title($featured_article_block);
$article_link = get_permalink($featured_article_block);
$tags = get_the_tags($featured_article_block);
$categories = get_the_category($featured_article_block);
$author = get_field('author_field', $featured_article_block);
$thumbnail = get_field('thumbnail_field', $featured_article_block);
?>
<section class="">
    <h1><?php echo $title ?></h1>
</section>