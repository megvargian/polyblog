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
            <div class="swiper author_swiper_block">
                <div class="swiper-wrapper">
                    <?php foreach ($authors_list as $author) { ?>
                        <div class="swiper-slide">
                            <?php $author_id = $author['author'];
                            $author_title = get_the_title($author_id);
                            $author_image = get_field('author_profile', $author_id);
                            $author_link = get_permalink($author_id); ?>
                            <p><?php echo esc_html($author_title); ?></p>
                            <a href="<?php echo $author_link; ?>" target="_blank">
                                <img class="author-image" src="<?php echo $author_image ?>"
                                    alt="<?php echo $author_title ?>" />
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="custom-swiper-button-prev">
                    <img src="http://polybloglb.com/wp-content/uploads/2024/10/swiper_arrow_left.png"
                        alt="previous author" />
                </div>
                <div class="custom-swiper-button-next">
                    <img src="http://polybloglb.com/wp-content/uploads/2024/10/swiper_arrow_right.png"
                        alt="next author" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.author_swiper_block', {
            loop: true,
            slidesPerView: 5,
            navigation: {
                nextEl: '.custom-swiper-button-next',
                prevEl: '.custom-swiper-button-prev',
            },
        });
    });
</script>