<?php
/**
 * HomePage YouTube featured videos. Block 5
 */

$yt_featured_vids_block = get_fields();
?>
<section class="w-100 youtube-featured-vids-bg d-none d-lg-block">
   <div class="container">
        <div class="row youtube-featured-videos-row">
            <div class="col youtube-featured-vid-button-col d-block w-100">
                <a href="<?php echo $yt_featured_vids_block['link_1'] ?>" target="_blank">
                    <img class="youtube-featured-video-thumbnail d-block w-100" src="<?php echo $yt_featured_vids_block['thumbnail_1']; ?>" alt="YouTube">
                </a>
                <p>
                    <?php echo $yt_featured_vids_block['title_1'] ?>
                </p>
            </div>
            <div class="col youtube-featured-vid-button-col d-block w-100">
                <a href="<?php echo $yt_featured_vids_block['link_2'] ?>" target="_blank">
                    <img class="youtube-featured-video-thumbnail d-block w-100" src="<?php echo $yt_featured_vids_block['thumbnail_2']; ?>" alt="YouTube">
                </a>
                <p>
                    <?php echo $yt_featured_vids_block['title_2'] ?>
                </p>
            </div>
            <div class="col youtube-featured-vid-texts-col">
                <p>
                    <?php echo $yt_featured_vids_block['text_top'] ?>
                </p>
                <p>
                    <?php echo $yt_featured_vids_block['text_bottom'] ?>
                </p>
            </div>
        </div>
   </div>
</section>
<section class="w-100 youtube-playlist-bg" >
    <div class="container-fluid d-lg-none d-block py-4 position-relative">
        <div class="swiper youtube-production-slider">
            <div class="swiper-wrapper">
                <?php foreach ($yt_featured_vids_block['mobile_section']['youtube_slides'] as $key => $yt_slide) {
                    if($yt_slide['youtube_video_or_view_more_section']){?>
                    <div class="swiper-slide">
                        <a href="<?php echo $yt_slide['link']; ?>">
                            <div class="youtube-video-link">
                                <img class="bg-image" src="<?php echo $yt_slide['image']; ?>" alt="youtube">
                                <img class="youtube-playlist-btn"
                                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg"
                                    alt="YouTube">
                            </div>
                        </a>
                    </div>
                 <?php } else { ?>
                    <div class="swiper-slide">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="d-block">
                                <img class="youtube-full-circle" src="<?php echo $yt_slide['image_view_more']; ?>" alt="youtube">
                                <a href="<?php echo $yt_slide['button_link']; ?>" class="view-more-btn">
                                    <?php echo $yt_slide['button_text']; ?>
                                </a>
                            </div>
                            <div class="d-block mx-3">
                                <p>
                                    <?php echo $yt_slide['paragraph']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>
        </div>
        <div class="swiper-pagination-youtube-production-slider"></div>
    </div>
</section>

<script>
jQuery(document).ready(function($) {
    var swiper = new Swiper('.youtube-production-slider', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: false,
        pagination: {
            el: '.swiper-pagination-youtube-production-slider',
        },
    });
});
</script>