<?php
/**
 * HomePage Single Featured Article Block Template
 */

$featured_article_block = get_field('selected_article');

$title = get_the_title($featured_article_block);
$article_link = get_permalink($featured_article_block);
$tags = get_the_tags($featured_article_block);
$categories = get_the_category($featured_article_block);
$author = get_field('author', $featured_article_block);
$thumbnail = get_field('article_thumbnail', $featured_article_block);
?>
<div class="single-featured-article-container">
    <a href="<?php echo $article_link; ?>">
        <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>" />
    </a>
    <div class="right-container">
        <div class="categories">
            <?php foreach ($categories as $category) { ?>
                <span class="category">
                    <?php echo esc_html($category->name); ?>
                </span>
            <?php } ?>
        </div>
        <div class="title">
            <a href="<?php echo $article_link; ?>">
                <h1>
                    <?php echo $title; ?>
                </h1>
            </a>
        </div>
        <div class="author-tags">
            <div class="author">
                <h3>
                    <?php echo $author ?>
                </h3>
            </div>
            <div class="tags">
                <?php foreach ($tags as $tag) { ?>
                    <?php echo esc_html($tag->name); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>