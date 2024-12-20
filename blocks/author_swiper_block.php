<?php
/**
 * HomePage Author Swiper Block Template
 */

$author_swiper_block = get_fields();
$authors_list = $author_swiper_block['authors_list'];
?>
<div class="container-fluid author-swiper-container py-5">
    <div class="row">
        <div class="col">
            <div class="swiper author_swiper_block">
                <div class="swiper-wrapper">
                    <?php foreach ($authors_list as $author) { ?>
                        <div class="swiper-slide">
                            <?php $author_id = $author['author'];
                            $author_title = get_the_title($author_id);
                            $author_image = get_field('author_profile', $author_id);
                            $author_link = get_permalink($author_id); ?>
                            <!-- <p><?php echo esc_html($author_title); ?></p> -->
                            <a href="<?php echo $author_link; ?>" target="_blank">
                                <div class="author-image">
                                    <img class="img-fluid" src="<?php echo $author_image ?>"
                                    alt="<?php echo $author_title ?>" />
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-prev swiper-button-prev-last-part"></div>
                <div class="swiper-button-next swiper-button-next-last-part"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.author_swiper_block', {
            loop: true,
            slidesPerView: 4,
            navigation: {
                nextEl: '.swiper-button-next-last-part',
                prevEl: '.swiper-button-prev-last-part',
            },
        });
    });
</script>