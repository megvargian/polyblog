<?php
/**
 * HomePage YouTube playlist block. Block 4
 */

$yt_playlist_block = get_fields();
?>
<section class="w-100 youtube-playlist-bg d-none d-lg-block">
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
        <div class="row" style="min-height: 40rem">
            <div class="col d-flex justify-content-center align-items-center">
                <img class="youtube-playlist-btn" src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-production-icon.svg" alt="YouTube">
            </div>
        </div>
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="en-regular">polyblog reduces special contenpolyblog reduces special content...t...</p>
                <p></p>
            </div>
            <div class="col">
                <p class="ar-regular">انتاجاتنـــــــــــــــــــــ
ـــــا الخاصـــــــــــــةانتاجاتنـــــــــــــــــــــ
ـــــا الخاصـــــــــــــة</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
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
</section>