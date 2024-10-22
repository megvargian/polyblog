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

                <?php $author_id = $author['author'];
                $author_title = get_the_title($author_id); ?>

                <pre>echo <?php echo esc_html($author_title); ?></pre>
                <p><?php echo esc_html($author_title); ?></p>
            </div>
        </div>
    <?php } ?>
</div>