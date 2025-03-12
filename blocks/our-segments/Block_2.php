<?php
/**
 * Our Segements Block two Template
 */

$block_two_fields = get_fields();
?>
<section class="bg-orange-section">
    <div class="white-line"></div>
    <div class="container py-sm-5 py-3">
        <div class="row mb-5">
            <div class="col-12">
                <a href="<?php echo $block_two_fields['main_link'];?>">
                    <img class="d-md-block d-none w-100" src="<?php echo $block_two_fields['desktop_image']; ?>"
                        alt="desktop_image">
                    <img class="d-md-none d-block w-100" src="<?php echo $block_two_fields['mobile_image']; ?>"
                        alt="mobile_image">
                </a>
            </div>
        </div>
        <div class="row custom-border-radius py-3 px-4">
            <div class="col-6 text-left">
                <h5 class="en-bold mb-2"><?php echo $block_two_fields['en_title']; ?></h5>
                <p class="en-regular">
                    <?php echo $block_two_fields['en_paragraph']; ?>
                </p>
            </div>
            <div class="col-6 text-right">
                <h5 class="ar-bold mb-2"><?php echo $block_two_fields['ar_title']; ?></h5>
                <p class="ar-regular">
                    <?php echo $block_two_fields['ar_paragraph']; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="white-line"></div>
</section>
<script>
jQuery(document).ready(function($) {});
</script>