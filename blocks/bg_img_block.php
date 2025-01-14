<?php
/**
 * HomePage Bg Image Block Template
 */

$bg_img_block = get_fields();
?>
<section class="d-lg-block d-none">
    <?php if($bg_img_block['main_image_url']) {?>
        <a href="<?php echo $bg_img_block['main_image_url'] ?>">
            <img class="w-100 d-block" src="<?php echo $bg_img_block['main_image']; ?>" alt="">
        </a>
    <?php } else { ?>
        <img class="w-100 d-block" src="<?php echo $bg_img_block['main_image']; ?>" alt="">
    <?php } ?>
</section>
<section class="d-lg-none d-block">
    <?php if($bg_img_block['main_image_url_mobile']) {?>
        <a href="<?php echo $bg_img_block['main_image_url'] ?>">
            <img class="w-100 d-block" src="<?php echo $bg_img_block['main_image_mobile']; ?>" alt="">
        </a>
    <?php } else { ?>
        <img class="w-100 d-block" src="<?php echo $bg_img_block['main_image_mobile']; ?>" alt="">
    <?php } ?>
</section>