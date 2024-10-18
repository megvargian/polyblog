<?php
/**
 * HomePage YouTube playlist block. Block 4
 */

$yt_playlist_block = get_fields();
?>
<section class="w-100 youtube-playlist-bg">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col youtube-playlist-button-col">
                <a href="<?php echo $yt_playlist_block['title_link'] ?>" target="_blank">
                    <img class="youtube-playlist-btn" src="<?php echo $yt_playlist_block['title']; ?>" alt="YouTube">
                </a>
            </div>
            <div class="col youtube-playlist-button-col">
                <a href="<?php echo $yt_playlist_block['yt_link'] ?>" target="_blank">
                    <img class="youtube-playlist-btn"
                        src="http://polybloglb.com/wp-content/uploads/2024/10/clickformore.png" alt="YouTube">
                </a>
            </div>
            <div class="col youtube-playlist-button-col">
                <img class="youtube_featured_image" src="<?php echo $yt_playlist_block['yt_image']; ?>" alt="YouTube">
            </div>
            <div class="col youtube-playlist-button-col">
                <a href="<?php echo $yt_playlist_block['episodes_link'] ?>" target="_blank">
                    <img class="youtube-playlist-btn" src="<?php echo $yt_playlist_block['episodes']; ?>" alt="YouTube">
                </a>
            </div>
        </div>
    </div>
</section>