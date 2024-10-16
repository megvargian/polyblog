<?php
/**
 * HomePage YouTube playlist block.
 */

$yt_playlist_block = get_fields();
?>
<section class="w-100 youtube-playlist-bg">
    <div class="row">
        <div class="col youtube-playlist-button">
            <a class="youtube_playlist_img" href="<?php echo $yt_playlist_block['title_link'] ?>" target="_blank">
                <img src="<?php echo $yt_playlist_block['title']; ?>" alt="YouTube">
            </a>
        </div>
        <div class="col youtube-playlist-button">
            <a href="<?php echo $yt_playlist_block['yt_link'] ?>" target="_blank">
                <img src="http://polybloglb.com/wp-content/uploads/2024/10/clickformore.png" alt="YouTube">
            </a>
        </div>
        <div class="col youtube-playlist-button">
            <img src="<?php echo $yt_playlist_block['yt_image']; ?>" alt="YouTube">
        </div>
        <div class="col youtube-playlist-button">
            <a class="youtube_playlist_img" href="<?php echo $yt_playlist_block['episodes_link'] ?>" target="_blank">
                <img src="<?php echo $yt_playlist_block['episodes']; ?>" alt="YouTube">
            </a>
        </div>
    </div>
</section>
