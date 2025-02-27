<?php
/**
 * HomePage Bg Image Block Template
 */

$bg_img_block = get_fields();
    if(!isMob()){
?>
<section class="d-lg-block d-none position-relative">
    <?php if($bg_img_block['main_image_url']) {?>
    <a href="<?php echo $bg_img_block['main_image_url'] ?>">
        <img class="w-100 d-block" src="<?php echo $bg_img_block['main_image']; ?>"
            alt="<?php echo $bg_img_block['main_image']; ?>">
        <img class="position-absolute cursor-gif-class"
            src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/cursor.gif" alt="cursor">
    </a>
    <?php } else { ?>
    <img class="w-100 d-block" src="<?php echo $bg_img_block['main_image']; ?>"
        alt="<?php echo $bg_img_block['main_image']; ?>">
    <?php } ?>
</section>
<?php } else { ?>
<section class="d-lg-none d-block">
    <?php if($bg_img_block['main_image_url_mobile']) {?>
    <a href="<?php echo $bg_img_block['main_image_url'] ?>">
        <img class="w-100 d-block" src="<?php echo $bg_img_block['main_image_mobile']; ?>"
            alt="<?php echo $bg_img_block['main_image_mobile']; ?>">
    </a>
    <?php } else { ?>
    <img class="w-100 d-block" src="<?php echo $bg_img_block['main_image_mobile']; ?>"
        alt="<?php echo $bg_img_block['main_image_mobile']; ?>">
    <?php } ?>
</section>
<?php } ?>