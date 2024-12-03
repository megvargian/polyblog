<?php
/**
 * HomePage Author Block Template
 */

$author_block = get_fields();
$authors_list = $author_block['authors_list'];
$rows = array_chunk($authors_list, 4);
?>
<section class="author-block-container py-5">
    <div class="container">
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
                    <div class="col single-author-col">
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
</section>