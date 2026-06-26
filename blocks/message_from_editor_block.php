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
                <div class="d-flex justify-content-end align-items-center message-editor-mobile-lang-switcher">
                    <div class="mx-1 languages ar-regular active" data-lang="ar" role="button" tabindex="0" aria-label="Switch to Arabic" aria-pressed="true">
                    ع
                    </div>
                    <div class="mx-1 languages en-regular" data-lang="en" role="button" tabindex="0" aria-label="Switch to English" aria-pressed="false">
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
            <div class="col-md-9 col-7 justify-content-center align-items-center d-flex message-editor-mobile-text-holder">
               <p class="ar message-editor-mobile-text" data-lang="ar">
                    <?php echo $message_from_deitor_fields['ar_text']; ?>
               </p>
               <p class="en message-editor-mobile-text d-none" data-lang="en">
                    <?php echo $message_from_deitor_fields['en_text']; ?>
               </p>
            </div>
            <div class="col-md-3 col-5 justify-content-center d-flex">
                <img src="<?php echo $message_from_deitor_fields['middle_profile_image'];?>" alt="profile">
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var mobileBreakpoint = window.matchMedia('(max-width: 991.98px)');
    if (!mobileBreakpoint.matches) {
        return;
    }

    var block = document.querySelector('.message-for-editor-section');
    if (!block) {
        return;
    }

    var switcher = block.querySelector('.message-editor-mobile-lang-switcher');
    var buttons = block.querySelectorAll('.message-editor-mobile-lang-switcher .languages');
    var texts = block.querySelectorAll('.message-editor-mobile-text');

    if (!switcher || !buttons.length || !texts.length) {
        return;
    }

    var setActiveLanguage = function (lang) {
        buttons.forEach(function (button) {
            var isActive = button.getAttribute('data-lang') === lang;
            button.classList.toggle('active', isActive);
            button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
        });

        texts.forEach(function (text) {
            var isMatch = text.getAttribute('data-lang') === lang;
            text.classList.toggle('d-none', !isMatch);
        });
    };

    setActiveLanguage('ar');

    switcher.addEventListener('click', function (event) {
        var langButton = event.target.closest('.languages');
        if (!langButton) {
            return;
        }

        var selectedLang = langButton.getAttribute('data-lang');
        if (!selectedLang) {
            return;
        }

        setActiveLanguage(selectedLang);
    });

    switcher.addEventListener('keydown', function (event) {
        if (event.key !== 'Enter' && event.key !== ' ') {
            return;
        }

        var langButton = event.target.closest('.languages');
        if (!langButton) {
            return;
        }

        event.preventDefault();
        var selectedLang = langButton.getAttribute('data-lang');
        if (selectedLang) {
            setActiveLanguage(selectedLang);
        }
    });
});
</script>