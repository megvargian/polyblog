<?php
/**
 * HomePage Author Swiper Block Template
 */

$author_swiper_block = get_fields();
$authors_list = $author_swiper_block['authors_list'];
?>
<div class="container-fluid author-swiper-container">
    <div class="row">
        <div class="col">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($authors_list as $author) { ?>
                        <div class="swiper-slide">
                            <?php $author_id = $author['author'];
                            $author_title = get_the_title($author_id);
                            $author_image = get_field('author_profile', $author_id); ?>
                            <p><?php echo esc_html($author_title); ?></p>
                            <img src="<?php echo $author_image ?>" alt="<?php echo $author_title ?>" />
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.swiper', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>