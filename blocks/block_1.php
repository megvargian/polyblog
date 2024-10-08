<?php
/**
 * HomePage First Block Template
 */

$homepage_first_block = get_fields();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?php echo $homepage_first_block['title']; ?></h1>
        </div>
        <div class="col-12">
            <img src="<?php echo $homepage_first_block['image']; ?>" alt="<?php echo $homepage_first_block['title']; ?>">
        </div>
    </div>
</div>