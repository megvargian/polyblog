<?php
/**
 * HomePage Single Featured Article Block Template
 */

$featured_article_block = get_fields();

$title = get_the_title($featured_article_block['selected_article']);
$article_link = get_permalink($featured_article_block['selected_article']);
$tags = get_the_tags($featured_article_block['selected_article']);
$categories = get_the_category($featured_article_block['selected_article']);
$author = get_field('author', $featured_article_block['selected_article']);
$thumbnail = get_field('article_thumbnail', $featured_article_block['selected_article']);
?>
<pre><?php print_r($featured_article_block); ?></pre>
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
                <h2>
                    <?php echo $title; ?>
                </h2>
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