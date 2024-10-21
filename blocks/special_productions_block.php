<?php
/**
 * HomePage Special Productions Block Template
 */

$special_productions_block = get_fields();
?>

<div class="container-fluid special-productions">
    <div class="row">
        <div class="col">
            <a href="<?php echo $special_productions_block['special_productions_url'] ?>">
                <img class="w-100 d-block" src="<?php echo $special_productions_block['special_productions_image']; ?>" alt="Special productions">
            </a>
        </div>
    </div>
</div>