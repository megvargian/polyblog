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
                        <a href="#">
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
                     $author_title = $author['title'];
                     $author_expertise = $author['sub_title'];
                    ?>
                    <div class="col-4 single-author-col">
                        <a href="#">
                            <div class="single-author-container">
                                <div class="author-image">
                                    <img class="img-fluid" src="<?php echo $author['profile_image'] ?>"
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