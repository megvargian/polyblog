<?php
/**
 * HomePage Author Swiper Block Template
 */

$author_swiper_block = get_fields();

// $title = get_the_title($author_swiper_block);
// $author_image = $author_swiper_block['author_profile'];
$authors_list = $author_swiper_block['authors_list'];
?>
<div class="container-fluid">
    <pre><?php print_r($authors_list); ?></pre>
    <?php foreach ($authors_list as $author) { ?>
        <div class="row">
            <div class="col">
                <pre>print_r <?php print_r($author); ?></pre>
                <pre>echo <?php echo $author; ?></pre>
                <?php echo esc_html($author->title); ?>
            </div>
        </div>
    <?php } ?>
</div>