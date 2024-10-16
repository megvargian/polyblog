<?php
/**
 * HomePage YouTube featured videos. Block 5
 */

$yt_featured_vids_block = get_fields();
?>
<section class="w-100 youtube-featured-vids-bg">
    <div class="row youtube-featured-videos-row">
        <div class="col youtube-featured-vid-button-col">
            <a href="<?php echo $yt_featured_vids_block['link_1'] ?>" target="_blank">
                <img class="youtube-featured-video-thumbnail" src="<?php echo $yt_featured_vids_block['thumbnail_1']; ?>" alt="YouTube">
            </a>
            <p><?php echo $yt_featured_vids_block['title_1'] ?></p>
        </div>
        <div class="col youtube-featured-vid-button-col">
            <a href="<?php echo $yt_featured_vids_block['link_2'] ?>" target="_blank">
                <img class="youtube-featured-video-thumbnail" src="<?php echo $yt_featured_vids_block['thumbnail_2']; ?>" alt="YouTube">
            </a>
            <p><?php echo $yt_featured_vids_block['title_2'] ?></p>
        </div>
        <div class="col">
            <p>
            <?php echo $yt_featured_vids_block['text_top'] ?>
            </p>
            <p>
            <?php echo $yt_featured_vids_block['text_bottom'] ?>
            </p>
        </div>
    </div>
</section>