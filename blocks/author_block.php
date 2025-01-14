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
                    $author_id = $author['author'];
                    $author_title = get_the_title($author_id);
                    $author_image = get_field('author_profile', $author_id);
                    $author_expertise = get_field('expertise', $author_id);
                    $author_link = get_permalink($author_id);
                    ?>
                    <div class="col-3 single-author-col">
                        <a href="<?php echo $author_link; ?>" target="_blank">
                            <div class="single-author-container">
                                <div class="author-image">
                                    <img class="img-fluid" src="<?php echo $author_image ?>"
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
    <div class="container d-md-none d-block">
        <div class="row single-red-border">
            <div class="col-6">
                <div class="d-flex justify-content-center align-items-center px-sm-5 px-2 h-100">
                    <div class="inner-author mx-auto">
                        <p class="text-center" style="color: #fff;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam doloremque exercitationem qui
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 px-0">
                <img class="w-100 h-100 d-block single-red-border-left" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/board-img-mobile.png" alt="article-title">
            </div>
        </div>
        <div class="row my-3 justify-content-center">
            <?php foreach ($rows as $row) { ?>
                <?php foreach ($row as $author) { ?>
                    <?php
                    $author_id = $author['author'];
                    $author_title = get_the_title($author_id);
                    $author_image = get_field('author_profile', $author_id);
                    $author_expertise = get_field('expertise', $author_id);
                    $author_link = get_permalink($author_id);
                    ?>
                    <div class="col-4 single-author-col">
                        <a href="<?php echo $author_link; ?>" target="_blank">
                            <div class="single-author-container">
                                <div class="author-image">
                                    <img class="img-fluid" src="<?php echo $author_image ?>"
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
    jQuery(document).ready(function ($) {
    });
</script>