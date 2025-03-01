<?php
/**
 * Our Segements Block One Template
 */

$block_one_fields = get_fields();
?>
<section>
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 pb-5">
                <img class="d-md-block d-none w-100" src="<?php echo $block_one_fields['desktop_image']; ?>" alt="desktop_image">
                <img class="d-md-none d-block w-100" src="<?php echo $block_one_fields['mobile_image']; ?>" alt="mobile_image">
            </div>
            <div class="col-6 text-left">
                <h5 class="en-bold mb-2"><?php echo $block_one_fields['en_title']; ?></h5>
                <p class="en-regular">
                    <?php echo $block_one_fields['en_paragraph']; ?>
                </p>
            </div>
            <div class="col-6 text-right">
                <h5 class="ar-bold mb-2"><?php echo $block_one_fields['ar_title']; ?></h5>
                <p class="ar-regular">
                    <?php echo $block_one_fields['ar_paragraph']; ?>
                </p>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function ($) {
    });
</script>