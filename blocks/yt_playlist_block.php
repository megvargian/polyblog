<?php
/**
 * HomePage YouTube playlist block. Block 4
 */

$yt_playlist_block = get_fields();
$row = $yt_playlist_block['one_row_youtube_section'];
?>
<section class="w-100 youtube-playlist-bg" id="youtube-playlist-bg">
    <div class="container py-4">
        <div class="row justify-content-between">
            <div class="col">
                <h3 class="en-bold">
                    <?php echo $yt_playlist_block['en_title']; ?>
                </h3>
                <p></p>
            </div>
            <div class="col">
                <h3 class="ar-bold" style="line-height: 1.27">
                    <?php echo $yt_playlist_block['ar_title']; ?>
                </h3>
            </div>
        </div>
        <div class="row custom-min-height mb-3">
            <video class="video w-100" width="100%" autoplay loop muted>
                <source src="<?php echo esc_url($yt_playlist_block['video']); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="col d-flex justify-content-center align-items-center yt-icon">
                <a href="<?php echo $yt_playlist_block['youtube_link']; ?>">
                    <img class="youtube-playlist-btn d-block"
                        src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg"
                        alt="YouTube">
                </a>
            </div>
        </div>
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="en-regular"><?php echo $yt_playlist_block['en_subtitle']; ?>
                </p>
                <p></p>
            </div>
            <div class="col">
                <p class="ar-regular">
                    <?php echo $yt_playlist_block['ar_subtitle']; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid d-lg-block d-none">
        <div class="row justify-content-center">
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a class="justify-content-center d-flex align-items-center" href="<?php echo $row['main_link'] ?>" target="_blank">
                    <div class="d-block">
                        <p class="en-bold text-center"><?php echo $row['en_title'];?></p>
                        <p class="ar-bold text-center"><?php echo $row['ar_title'];?></p>
                    </div>
                </a>
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a class="justify-content-center d-flex align-items-center" href="<?php echo $row['main_link'] ?>" target="_blank">
                    <img class="youtube-playlist-btn d-block"
                        src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg"
                        alt="YouTube">
                </a>
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a class="justify-content-center d-flex align-items-center" href="<?php echo $row['main_link'] ?>">
                    <img class="youtube_featured_image d-block" src="<?php echo $row['featured_image']; ?>" alt="YouTube">
                </a>
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a class="justify-content-center d-flex align-items-center" href="<?php echo $row['main_link'] ?>" target="_blank">
                    <div class="bg-black d-block">
                        <p class="en-regular"><?php echo $row['en_title_episode'] ?></p>
                        <p class="ar-regular"><?php echo $row['ar_title_episode'] ?></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid d-lg-none d-block py-4 position-relative">
        <div class="swiper youtube-production-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="youtube-video-link">
                        <img class="youtube-playlist-btn"
                            src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg"
                            alt="YouTube">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-block">
                            <div class="youtube-full-circle"></div>
                            <a href="#" class="view-more-btn">
                                View more
                            </a>
                        </div>
                        <div class="d-block mx-3">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia at molestias,
                                perspiciatis voluptatem libero deleniti facilis quod laborum in, labore obcaecati
                                minima, magni dicta ad alias nisi veniam consequatur dolore?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="youtube-video-link">
                        <img class="youtube-playlist-btn"
                            src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg"
                            alt="YouTube">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-block">
                            <div class="youtube-full-circle"></div>
                            <a href="#" class="view-more-btn">
                                View more
                            </a>
                        </div>
                        <div class="d-block mx-3">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia at molestias,
                                perspiciatis voluptatem libero deleniti facilis quod laborum in, labore obcaecati
                                minima, magni dicta ad alias nisi veniam consequatur dolore?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="youtube-video-link">
                        <img class="youtube-playlist-btn"
                            src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg"
                            alt="YouTube">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-block">
                            <div class="youtube-full-circle"></div>
                            <a href="#" class="view-more-btn">
                                View more
                            </a>
                        </div>
                        <div class="d-block mx-3">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia at molestias,
                                perspiciatis voluptatem libero deleniti facilis quod laborum in, labore obcaecati
                                minima, magni dicta ad alias nisi veniam consequatur dolore?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination-youtube-production-slider"></div>
    </div> -->
</section>

<!-- <script>
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
</script> -->