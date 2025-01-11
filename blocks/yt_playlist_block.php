<?php
/**
 * HomePage YouTube playlist block. Block 4
 */

$yt_playlist_block = get_fields();
?>
<section class="w-100 youtube-playlist-bg">
    <div class="container py-4">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <h3 class="en-bold">our special <br> productions</h3>
                <p></p>
            </div>
            <div class="col">
                <h3 class="ar-bold">انتاجاتنـــــــــــــــــــــ <br> ـــــا الخاصـــــــــــــة</h3>
            </div>
        </div>
        <div class="row custom-min-height" style="min-height: 40rem">
            <div class="col d-flex justify-content-center align-items-center">
                <img class="youtube-playlist-btn" src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg" alt="YouTube">
            </div>
        </div>
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="en-regular">polyblog reduces special <br> contenpolyblog reduces <br> special content...t...</p>
                <p></p>
            </div>
            <div class="col">
                <p class="ar-regular">انتاجاتنـــــــــــــــــــــ <br>
ـــــا الخاصـــــــــــــةانتاجاتنـــــــــــــــــــــ <br>
ـــــا الخاصـــــــــــــة</p>
            </div>
        </div>
    </div>
    <div class="container-fluid d-lg-block d-none">
        <div class="row justify-content-center">
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a href="<?php echo $yt_playlist_block['title_link'] ?>" target="_blank">
                    <!-- <img class="youtube-playlist-btn" src="<?php //echo $yt_playlist_block['title']; ?>" alt="YouTube"> -->
                     <div class="d-block">
                        <p class="en-bold">ASSAHA</p>
                        <p class="ar-bold">الســـــاحة</p>
                     </div>
                </a>
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a href="<?php echo $yt_playlist_block['yt_link'] ?>" target="_blank">
                    <img class="youtube-playlist-btn"
                        src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg" alt="YouTube">
                </a>
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <img class="youtube_featured_image" src="<?php echo $yt_playlist_block['yt_image']; ?>" alt="YouTube">
            </div>
            <div class="col youtube-playlist-button-col justify-content-center d-flex align-items-center">
                <a href="<?php echo $yt_playlist_block['episodes_link'] ?>" target="_blank">
                    <!-- <img class="youtube-playlist-btn" src="<?php //echo $yt_playlist_block['episodes']; ?>" alt="YouTube"> -->
                    <div class="bg-black">
                        <p class="en-regular">7 Episodes</p>
                        <p class="ar-regular">٧ حلقــات</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid d-lg-none d-block py-4">
        <div class="swiper youtube-production-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="youtube-video-link">
                        <img class="youtube-playlist-btn" src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg" alt="YouTube">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="youtube-full-circle"></div>
                        <a href="#" class="view-more-btn">
                            View more
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="youtube-video-link">
                        <img class="youtube-playlist-btn" src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg" alt="YouTube">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="youtube-full-circle"></div>
                        <a href="#" class="view-more-btn">
                            View more
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="youtube-video-link">
                        <img class="youtube-playlist-btn" src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg" alt="YouTube">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="youtube-full-circle"></div>
                        <a href="#" class="view-more-btn">
                            View more
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function ($) {
        var swiper = new Swiper('.youtube-production-slider', {
            slidesPerView: 2.8,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
            },
        });
    });
</script>