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
                <?php $author_id = $author['author'];
                $author_title = get_the_title($author_id);
                $author_image = get_field('author_profile', $author_id); ?>

                <img src="<?php echo $author_image ?>" />
                <p><?php echo esc_html($author_title); ?></p>
            </div>
        </div>
    <?php } ?>
</div>