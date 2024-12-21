<?php
/**
 * HomePage YouTube playlist block. Block 4
 */

$yt_playlist_block = get_fields();
?>
<section class="w-100 youtube-playlist-bg d-none d-lg-block">
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
                    <img class="youtube-playlist-btn" src="<?php echo $yt_playlist_block['episodes']; ?>" alt="YouTube">
                </a>
            </div>
        </div>
    </div>
</section>