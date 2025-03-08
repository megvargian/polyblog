<?php
/**
 * HomePage YouTube playlist block. Block 4
 */

$yt_playlist_block = get_fields();
$row = $yt_playlist_block['one_row_youtube_section'];
$header_fields = get_fields('options');
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
        <div class="row custom-min-height">
            <video class="video" width="100%" autoplay loop muted>
                <source src="<?php echo esc_url($header_fields['header_video']); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="col d-flex justify-content-center align-items-center">
                <img class="youtube-playlist-btn"
                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg"
                    alt="YouTube">
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
                <a href="<?php echo $row['title_link'] ?>" target="_blank">
                    <div class="d-block">
                        <p class="en-bold"><?php echo $row['en_title'];?></p>
                        <p class="ar-bold"><?php echo $row['ar_title'];?></p>
                    </div>
                </a>
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a href="<?php echo $row['youtube_link'] ?>" target="_blank">
                    <img class="youtube-playlist-btn"
                        src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg"
                        alt="YouTube">
                </a>
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <img class="youtube_featured_image" src="<?php echo $row['featured_image']; ?>" alt="YouTube">
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a href="<?php echo $row['episode_url'] ?>" target="_blank">
                    <div class="bg-black">
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