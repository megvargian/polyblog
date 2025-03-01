<?php

/**
 * HomePage Author Block Template
 */

$author_block = get_fields();
$authors_list = $author_block['authors_list'];
$rows = array_chunk($authors_list, 4);
?>
<section class="author-block-container py-5">
    <div class="container d-md-block d-none">
        <?php foreach ($rows as $row) { ?>
            <div class="row my-3 justify-content-center">
                <?php foreach ($row as $author) { ?>
                    <?php
                    $author_title = $author['title'];
                    $author_expertise = $author['sub_title'];
                    ?>
                    <div class="col-3 single-author-col">
                        <a href="#" target="_blank">
                            <div class="single-author-container">
                                <div class="author-image">
                                    <img class="img-fluid" src="<?php echo $author['profile_image'] ?>"
                                        alt="<?php echo $author_title ?>" />
                                </div>
                                <p><?php echo esc_html($author_title); ?></p>
                                <p><?php echo esc_html($author_expertise) ?></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <!-- VVV mobile VVV -->
    <div class="container d-md-none d-block">
        <div class="row my-3 justify-content-center">
            <?php foreach ($rows as $row) { ?>
                <?php foreach ($row as $author) { ?>
                    <?php
                    $author_id = $author['author'];
                    $author_title = get_the_title($author_id);
                    $author_expertise = get_field('expertise', $author_id);
                    $author_link = get_permalink($author_id);
                    ?>
                    <div class="col-4 single-author-col">
                        <a href="<?php echo $author_link; ?>" target="_blank">
                            <div class="single-author-container">
                                <div class="author-image">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($author_id); ?>"
                                        alt="<?php echo $author_title ?>" />
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function($) {});
</script>