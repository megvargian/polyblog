<?php
/**
 * HomePage Author Swiper Block Template
 */

$author_swiper_block = get_fields();

$title = get_the_title($author_swiper_block);
$author_image = $author_swiper_block['author_profile'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <img src="<?php echo $author_image ?>" />
        </div>
    </div>
</div>