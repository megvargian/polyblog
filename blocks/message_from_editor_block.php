<?php
/**
 * HomePage message from editor Block Template
 */

$message_from_deitor_fields = get_fields();
?>
<section class="message-for-editor-section">
    <img class="w-100 d-lg-block d-none" src="<?php echo $message_from_deitor_fields['main_image']; ?>" alt="message_from_directo_bannerr">
    <div class="container-fluid py-4 px-4">
        <div class="row justify-content-between d-flex d-lg-none">
            <div class="col d-flex justify-content-start align-items-center">
                <div class="d-flex justify-content-end align-items-center">
                    <div class="mx-1 languages ar-regular">
                    ع
                    </div>
                    <div class="mx-1 languages en-regular">
                    En
                    </div>
                </div>
            </div>
            <div class="col text-right">
                <h4 class="en-bold">A Message from <br> the editor</h4>
            </div>
        </div>
        <div class="row d-none d-lg-flex">
            <div class="col justify-content-center align-items-center d-lg-flex d-none">
               <p class="en">
                    <?php echo $message_from_deitor_fields['en_text']; ?>
               </p>
            </div>
            <div class="col-lg-3 justify-content-center d-flex">
                <img src="<?php echo $message_from_deitor_fields['middle_profile_image'];?>" alt="profile">
            </div>
            <div class="col justify-content-center align-items-center d-flex">
               <p class="ar">
                    <?php echo $message_from_deitor_fields['ar_text']; ?>
               </p>
            </div>
        </div>
        <div class="row d-flex d-lg-none">
            <div class="col-md-9 col-7 justify-content-center align-items-center d-flex">
               <p class="ar">
                    <?php echo $message_from_deitor_fields['ar_text']; ?>
               </p>
            </div>
            <div class="col-md-3 col-5 justify-content-center d-flex">
                <img src="<?php echo $message_from_deitor_fields['middle_profile_image'];?>" alt="profile">
            </div>
        </div>
    </div>
</section>