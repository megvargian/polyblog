<?php
/**
 * HomePage Author Block Template
 */

$author_block = get_fields();
$authors_list = $author_block['authors_list'];
$rows = array_chunk($authors_list, 4);
?>
<div class="container-fluid author-block-container">
    <?php foreach ($rows as $row) { ?>
        <div class="row">
            <div class="col">
                <?php foreach ($row as $author) { ?>
                    <?php $author_id = $author['author'];
                    $author_title = get_the_title($author_id);
                    $author_image = get_field('author_profile', $author_id);
                    $author_expertise = get_field('expertise', $author_id);
                    $author_link = get_permalink($author_id); ?>
                <?php } ?>
                <div class="single-author-container">
                    <a href="<?php echo $author_link; ?>" target="_blank">
                        <img class="author-image" src="<?php echo $author_image ?>" alt="<?php echo $author_title ?>" />
                    </a>
                    <p><?php echo esc_html($author_title); ?></p>
                    <p><?php echo esc_html($author_expertise) ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>