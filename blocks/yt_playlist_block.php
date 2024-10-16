<?php
/**
 * HomePage YouTube playlist block.
 */

$yt_playlist_block = get_fields();
?>
<style>
    .youtube_playlist_img {
        opacity: 1;
        transition: 0.3s ease-in-out;
    }

    .youtube_playlist_img:hover {
        opacity: 0.8;
        transition: 0.3s;
    }
</style>
<section class="">
    <a class="youtube_playlist_img" href="<?php echo $yt_playlist_block['yt_playlist_link'] ?>">
        <img class="w-100 d-block" src="<?php echo $yt_playlist_block['yt_playlist_image']; ?>" alt="YouTube">
    </a>
</section>