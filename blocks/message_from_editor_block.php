<?php
/**
 * HomePage message from editor Block Template
 */

$message_from_deitor_fields = get_fields();
?>
<section class="message-for-editor-section">
    <img class="w-100 d-block" src="<?php echo $message_from_deitor_fields['main_image']; ?>" alt="message_from_directo_bannerr">
    <div class="container-fluid py-4 px-4">
        <div class="row">
            <div class="col-4">
               <p class="en">
                    <?php echo $message_from_deitor_fields['en_text']; ?>
               </p>
            </div>
            <div class="col-4 justify-content-center d-flex">
                <img src="<?php echo $message_from_deitor_fields['middle_profile_image'];?>" alt="profile">
            </div>
            <div class="col-4">
               <p class="ar">
                    <?php echo $message_from_deitor_fields['ar_text']; ?>
               </p>
            </div>
        </div>
    </div>
</section>