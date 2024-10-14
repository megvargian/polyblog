<?php
/**
 * HomePage Bg Image Block Template
 */

$bg_img_block = get_fields();
?>
<section class="py-3">
    <?php if($bg_img_block['main_image_url']) {?>
        <a href="<?php echo $bg_img_block['main_image_url'] ?>">
            <img class="w-100" src="<?php echo $bg_img_block['main_image']; ?>" alt="">
        </a>
    <?php } else { ?>
        <img class="w-100" src="<?php echo $bg_img_block['main_image']; ?>" alt="">
    <?php } ?>
</section>