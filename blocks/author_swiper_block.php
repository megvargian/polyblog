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
    <?php foreach ($authors_list as $author) { ?>
        <div class="row">
            <div class="col">
                <?php echo get_the_title($author); ?>
            </div>
        </div>
    <?php } ?>
</div>