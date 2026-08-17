<?php
/**
 * HomePage Contact Us Block Template
 */

$contactus_fields = get_fields();
$pb_country_codes = [
    'Afghanistan' => '+93', 'Albania' => '+355', 'Algeria' => '+213', 'Andorra' => '+376',
    'Angola' => '+244', 'Argentina' => '+54', 'Armenia' => '+374', 'Australia' => '+61',
    'Austria' => '+43', 'Azerbaijan' => '+994', 'Bahrain' => '+973', 'Bangladesh' => '+880',
    'Belarus' => '+375', 'Belgium' => '+32', 'Belize' => '+501', 'Benin' => '+229',
    'Bhutan' => '+975', 'Bolivia' => '+591', 'Bosnia and Herzegovina' => '+387', 'Botswana' => '+267',
    'Brazil' => '+55', 'Brunei' => '+673', 'Bulgaria' => '+359', 'Burkina Faso' => '+226',
    'Burundi' => '+257', 'Cambodia' => '+855', 'Cameroon' => '+237', 'Canada' => '+1',
    'Cape Verde' => '+238', 'Central African Republic' => '+236', 'Chad' => '+235', 'Chile' => '+56',
    'China' => '+86', 'Colombia' => '+57', 'Comoros' => '+269', 'Costa Rica' => '+506',
    'Croatia' => '+385', 'Cuba' => '+53', 'Cyprus' => '+357', 'Czech Republic' => '+420',
    'Democratic Republic of the Congo' => '+243', 'Denmark' => '+45', 'Djibouti' => '+253', 'Dominica' => '+1-767',
    'Dominican Republic' => '+1-809', 'Ecuador' => '+593', 'Egypt' => '+20', 'El Salvador' => '+503',
    'Equatorial Guinea' => '+240', 'Eritrea' => '+291', 'Estonia' => '+372', 'Eswatini' => '+268',
    'Ethiopia' => '+251', 'Fiji' => '+679', 'Finland' => '+358', 'France' => '+33',
    'Gabon' => '+241', 'Gambia' => '+220', 'Georgia' => '+995', 'Germany' => '+49',
    'Ghana' => '+233', 'Greece' => '+30', 'Grenada' => '+1-473', 'Guatemala' => '+502',
    'Guinea' => '+224', 'Guinea-Bissau' => '+245', 'Guyana' => '+592', 'Haiti' => '+509',
    'Honduras' => '+504', 'Hungary' => '+36', 'Iceland' => '+354', 'India' => '+91',
    'Indonesia' => '+62', 'Iran' => '+98', 'Iraq' => '+964', 'Ireland' => '+353',
    'Israel' => '+972', 'Italy' => '+39', 'Ivory Coast' => '+225', 'Jamaica' => '+1-876',
    'Japan' => '+81', 'Jordan' => '+962', 'Kazakhstan' => '+7', 'Kenya' => '+254',
    'Kiribati' => '+686', 'Kuwait' => '+965', 'Kyrgyzstan' => '+996', 'Laos' => '+856',
    'Latvia' => '+371', 'Lebanon' => '+961', 'Lesotho' => '+266', 'Liberia' => '+231',
    'Libya' => '+218', 'Liechtenstein' => '+423', 'Lithuania' => '+370', 'Luxembourg' => '+352',
    'Madagascar' => '+261', 'Malawi' => '+265', 'Malaysia' => '+60', 'Maldives' => '+960',
    'Mali' => '+223', 'Malta' => '+356', 'Marshall Islands' => '+692', 'Mauritania' => '+222',
    'Mauritius' => '+230', 'Mexico' => '+52', 'Micronesia' => '+691', 'Moldova' => '+373',
    'Monaco' => '+377', 'Mongolia' => '+976', 'Montenegro' => '+382', 'Morocco' => '+212',
    'Mozambique' => '+258', 'Myanmar' => '+95', 'Namibia' => '+264', 'Nauru' => '+674',
    'Nepal' => '+977', 'Netherlands' => '+31', 'New Zealand' => '+64', 'Nicaragua' => '+505',
    'Niger' => '+227', 'Nigeria' => '+234', 'North Korea' => '+850', 'North Macedonia' => '+389',
    'Norway' => '+47', 'Oman' => '+968', 'Pakistan' => '+92', 'Palau' => '+680',
    'Palestine' => '+970', 'Panama' => '+507', 'Papua New Guinea' => '+675', 'Paraguay' => '+595',
    'Peru' => '+51', 'Philippines' => '+63', 'Poland' => '+48', 'Portugal' => '+351',
    'Qatar' => '+974', 'Republic of the Congo' => '+242', 'Romania' => '+40', 'Russia' => '+7',
    'Rwanda' => '+250', 'Saint Kitts and Nevis' => '+1-869', 'Saint Lucia' => '+1-758', 'Saint Vincent and the Grenadines' => '+1-784',
    'Samoa' => '+685', 'San Marino' => '+378', 'Sao Tome and Principe' => '+239', 'Saudi Arabia' => '+966',
    'Senegal' => '+221', 'Serbia' => '+381', 'Seychelles' => '+248', 'Sierra Leone' => '+232',
    'Singapore' => '+65', 'Slovakia' => '+421', 'Slovenia' => '+386', 'Solomon Islands' => '+677',
    'Somalia' => '+252', 'South Africa' => '+27', 'South Korea' => '+82', 'South Sudan' => '+211',
    'Spain' => '+34', 'Sri Lanka' => '+94', 'Sudan' => '+249', 'Suriname' => '+597',
    'Sweden' => '+46', 'Switzerland' => '+41', 'Syria' => '+963', 'Taiwan' => '+886',
    'Tajikistan' => '+992', 'Tanzania' => '+255', 'Thailand' => '+66', 'Timor-Leste' => '+670',
    'Togo' => '+228', 'Tonga' => '+676', 'Trinidad and Tobago' => '+1-868', 'Tunisia' => '+216',
    'Turkey' => '+90', 'Turkmenistan' => '+993', 'Tuvalu' => '+688', 'Uganda' => '+256',
    'Ukraine' => '+380', 'United Arab Emirates' => '+971', 'United Kingdom' => '+44', 'United States' => '+1',
    'Uruguay' => '+598', 'Uzbekistan' => '+998', 'Vanuatu' => '+678', 'Vatican City' => '+39',
    'Venezuela' => '+58', 'Vietnam' => '+84', 'Yemen' => '+967', 'Zambia' => '+260',
    'Zimbabwe' => '+263',
];
?>
<style>
.pb-error{color:#e74c3c;font-size:11px;display:block;margin-top:3px}
.pb-error:empty{display:none}
</style>
<?php
if(!isMob()){ ?>
    <section id="contact-us-section" class="py-4 d-md-block d-none <?php echo $contactus_fields['light_mode'] ? 'contact-us-section-light' : 'contact-us-section' ;?>">
        <div class="container-fluid">
                <!-- <div class="row justify-content-center">
                    <div class="col-5">
                        <input type="text" placeholder="your Name" required>
                        <input type="email" placeholder="email Address" required>
                        <div class="row px-0">
                            <div class="col-4 padding-left-0">
                                <input type="tel" placeholder="country code" required>
                            </div>
                            <div class="col-8">
                                <input type="tel" placeholder="phone number" required>
                            </div>
                        </div>
                        <input type="text" placeholder="social media links if relevant" required>
                        <input type="text" placeholder="areas of interest" required>
                        <input type="text" placeholder="Links to previous writings if present" required>
                        <div class="d-flex justify-content-between align-items-center select-language">
                            <label for="languages">I CAN WRITE IN:</label>
                            <select id="languages" name="languages[]" multiple>
                                <option class="en-regular" value="english">English</option>
                                <option class="ar-regular" value="arabic1">عربي</option>
                                <option class="en-regular" value="francese">Francese</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-5 custom-text-size-for-placeholder">
                        <textarea class="h-100" type="text" placeholder="Write your pitch here"></textarea>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center">
                        <button type="submit" class="submit-button">
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/send-icon.svg" alt="submit-icon">
                        </button>
                    </div>
                </div> -->
            <div class="form_validation_parent">
                <form id="polyblog-contact-desktop" novalidate dir="rtl">
                    <?php wp_nonce_field( 'polyblog_contact_nonce', 'pb_nonce' ); ?>
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <input type="text" name="pb_name" placeholder="your Name" required>
                            <span class="pb-error" data-for="pb_name"></span>
                            <input type="email" name="pb_email" placeholder="email Address" required>
                            <span class="pb-error" data-for="pb_email"></span>
                            <div class="row px-0">
                                <div class="col-8">
                                    <input type="tel" name="pb_phone" autocomplete="tel" placeholder="phone number" required>
                                    <span class="pb-error" data-for="pb_phone"></span>
                                </div>
                                <div class="col-4 padding-left-0">
                                    <input type="text" name="pb_country" list="pb-country-options-desktop" autocomplete="country" placeholder="country" aria-label="Search country name" required>
                                    <datalist id="pb-country-options-desktop">
                                        <?php foreach ( $pb_country_codes as $country_name => $country_code ) { ?>
                                            <option value="<?php echo esc_attr( $country_name . ' (' . $country_code . ')' ); ?>"></option>
                                        <?php } ?>
                                    </datalist>
                                    <span class="pb-error" data-for="pb_country"></span>
                                </div>
                            </div>
                            <input type="text" name="pb_social" placeholder="social media links if relevant">
                            <input type="text" name="pb_interests" placeholder="areas of interest" required>
                            <span class="pb-error" data-for="pb_interests"></span>
                            <input type="text" name="pb_writings" placeholder="Links to previous writings if present">
                            <div class="d-flex justify-content-between align-items-center select-language">
                                <ul class="d-flex justify-content-start align-items-center langs-desktop">
                                    <li class="en-regular"><p>English</p></li>
                                    <li class="mx-2 ar-regular"><p>&#1593;&#1585;&#1576;&#1610;</p></li>
                                    <li class="en-regular"><p>French</p></li>
                                </ul>
                                <label for="languages" style="text-align: left;">:I CAN WRITE IN</label>
                            </div>
                            <input type="hidden" name="pb_languages" class="hidden-input" value="">
                        </div>
                        <div class="col-5 custom-text-size-for-placeholder">
                            <textarea name="pb_pitch" class="h-100" placeholder="Write your pitch here" required></textarea>
                            <span class="pb-error" data-for="pb_pitch"></span>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <button type="submit" class="submit-button">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/assets/images/send-icon.svg" alt="submit-icon">
                                <span class="contact-form-submit-btn text-center" style="font-family:'Lexend-Bold'; display: flex; justify-content: center; ">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="contact_success_message" style="display:none"></div>
                <div class="contact_fail_message" style="display:none"></div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="py-4 contact-us-section d-lg-none" dir="ltr">
        <div class="container d-block">
            <!-- <form action="/" class="p-3 py-5 position-relative">
                <div class="swiper contact-us-swiper-mobile">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="d-block">
                                <h4 class="text-center pb-2">Step 1:</h4>
                                <input type="text" placeholder="your Name" required>
                                <input type="email" placeholder="email Address" required>
                                <div class="row px-0">
                                    <div class="col-4 padding-left-0">
                                        <input type="tel" placeholder="country code" required>
                                    </div>
                                    <div class="col-8">
                                        <input type="tel" placeholder="phone number" required>
                                    </div>
                                </div>
                                <div class="d-block mb-3">
                                    <p class="px-3 mb-2">Social media links</p>
                                    <ul class="d-flex justify-content-between align-items-center social-icons-mobile">
                                        <li class="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/instagram_logo_mobile.svg" alt="X">
                                        </li>
                                        <li class="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/facebook_logo_mobile.svg" alt="X">
                                        </li>
                                        <li class="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/X_logo_mobile.svg" alt="X">
                                        </li>
                                        <li class="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/youtube-mobile.svg" alt="X">
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-flex mx-auto justify-content-center py-2">
                                    <button class="next-button" name="next-slide">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <h4 class="text-center pb-2">Step 3:</h4>
                            <input type="text" placeholder="areas of interest" required>
                            <input type="text" placeholder="Links to previous writings if present" required>
                            <div class="d-block mb-3">
                                <p class="px-3 mb-2">I CAN WRITE IN:</p>
                                <ul class="d-flex justify-content-start align-items-center langs">
                                    <li class="">
                                        <button>English</button>
                                    </li>
                                    <li class="mx-2">
                                        <button>Arabic</button>
                                    </li>
                                    <li class="">
                                        <button>French</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex mx-auto justify-content-center py-2">
                                <button class="next-button" name="next-slide">
                                    Next
                                </button>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <h4 class="text-center pb-2">Step 3:</h4>
                            <textarea class="" style="height: 15rem;" type="text" placeholder="Write your pitch here"></textarea>
                            <div class="d-flex mx-auto justify-content-center py-2">
                                <button type="submit" name="submit" class="next-button">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination swiper-mobile-pagination"></div>
                 <ul class="d-flex justify-content-between align-items-center social-icons-mobile">
                      <li class="">
                         <img src="https://polybloglb.com/wp-content/themes/main/inc/assets/icons/instagram_logo_mobile.svg" alt="instagram">
                      </li>
                      <li class="">
                         <img src="https://polybloglb.com/wp-content/themes/main/inc/assets/icons/facebook_logo_mobile.svg" alt="facebook">
                      </li>
                     <li class="">
                        <img src="https://polybloglb.com/wp-content/themes/main/inc/assets/icons/X_logo_mobile.svg" alt="X">
                     </li>
                     <li class="">
                        <img src="https://polybloglb.com/wp-content/themes/main/inc/assets/icons/youtube-mobile.svg" alt="youtube">
                     </li>
                  </ul>
            </form> -->
            <div class="form_validation_parent position-relative">
                <form id="polyblog-contact-mobile" novalidate>
                    <?php wp_nonce_field( 'polyblog_contact_nonce', 'pb_nonce' ); ?>
                    <div class="swiper contact-us-swiper-mobile p-3 py-5 position-relative" dir="ltr">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="d-block">
                                    <h4 class="text-center pb-2" dir="ltr">Step 1:</h4>
                                    <input type="text" name="pb_name" placeholder="your Name" required>
                                    <span class="pb-error" data-for="pb_name"></span>
                                    <input type="email" name="pb_email" placeholder="email Address" required>
                                    <span class="pb-error" data-for="pb_email"></span>
                                    <div class="row px-0">
                                        <div class="col-4 padding-left-0">
                                            <input type="text" name="pb_country" list="pb-country-options-mobile" autocomplete="country" placeholder="country" aria-label="Search country name" required>
                                            <datalist id="pb-country-options-mobile">
                                                <?php foreach ( $pb_country_codes as $country_name => $country_code ) { ?>
                                                    <option value="<?php echo esc_attr( $country_name . ' (' . $country_code . ')' ); ?>"></option>
                                                <?php } ?>
                                            </datalist>
                                            <span class="pb-error" data-for="pb_country"></span>
                                        </div>
                                        <div class="col-8">
                                            <input type="tel" name="pb_phone" placeholder="phone number" required>
                                            <span class="pb-error" data-for="pb_phone"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex mx-auto justify-content-center py-2">
                                        <div class="next-button" name="next-slide">Next</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="d-block mb-3">
                                    <p class="px-3 mb-2">Social media links</p>
                                    <input type="text" name="pb_instagram" placeholder="Instagram">
                                    <input type="text" name="pb_facebook" placeholder="Facebook">
                                    <input type="text" name="pb_twitter" placeholder="Twitter">
                                    <input type="text" name="pb_youtube" placeholder="youtube">
                                    <div class="d-flex mx-auto justify-content-center py-2">
                                        <div class="next-button" name="next-slide">Next</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h4 class="text-center pb-2" dir="ltr">Step 2:</h4>
                                <input type="text" name="pb_interests" placeholder="areas of interest" required>
                                <span class="pb-error" data-for="pb_interests"></span>
                                <input type="text" name="pb_writings" placeholder="Links to previous writings if present">
                                <div class="d-block mb-3">
                                    <p class="px-3 mb-2">I CAN WRITE IN:</p>
                                    <ul class="d-flex justify-content-start align-items-center langs">
                                        <li class=""><p>English</p></li>
                                        <li class="mx-2"><p>Arabic</p></li>
                                        <li class=""><p>French</p></li>
                                    </ul>
                                    <input type="hidden" name="pb_languages" class="hidden-input" value="">
                                </div>
                                <div class="d-flex mx-auto justify-content-center py-2">
                                    <div class="next-button" name="next-slide">Next</div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h4 class="text-center pb-2" dir="ltr">Step 3:</h4>
                                <textarea name="pb_pitch" style="min-height:15rem" placeholder="Write your pitch here" required></textarea>
                                <span class="pb-error" data-for="pb_pitch"></span>
                                <div class="d-flex mx-auto justify-content-center py-2 submit-button">
                                    <button type="submit" class="next-button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="contact_success_message" style="display:none"></div>
                <div class="contact_fail_message" style="display:none"></div>
                <div class="swiper-pagination swiper-mobile-pagination"></div>
            </div>
        </div>
    </section>
<?php } ?>
<script>
jQuery(document).ready(function ($) {

    // ── Error helpers ──────────────────────────────────────────────────────
    function pbValidate($scope, $form) {
        var valid = true;
        $scope.find('[required]').each(function () {
            var $f   = $(this);
            var name = $f.attr('name');
            var val  = $f.val().trim();
            var $err = $form.find('.pb-error[data-for="' + name + '"]');
            if (!val) {
                $err.text(($f.attr('placeholder') || 'This field') + ' is required.');
                valid = false;
            } else if (name === 'pb_email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
                $err.text('Please enter a valid email address.');
                valid = false;
            } else {
                $err.text('');
            }
        });
        return valid;
    }
    function pbClearErrors($form) {
        $form.find('.pb-error').text('');
    }

    // ── Mobile Swiper ──────────────────────────────────────────────────────
    var swiperMobileContactForm = null;
    if ($('.contact-us-swiper-mobile').length) {
        swiperMobileContactForm = new Swiper('.contact-us-swiper-mobile', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-mobile-pagination',
                type: 'bullets',
                clickable: true,
            },
        });
    }

    // ── Next button: validate current slide then advance ───────────────────
    $('#polyblog-contact-mobile').on('click', '.next-button:not([type="submit"])', function () {
        if (!swiperMobileContactForm) return;
        var idx    = swiperMobileContactForm.activeIndex;
        var $slide = $('.contact-us-swiper-mobile .swiper-slide').eq(idx);
        var $form  = $('#polyblog-contact-mobile');
        if (pbValidate($slide, $form)) {
            swiperMobileContactForm.slideNext();
        }
    });

    // ── Language selection ─────────────────────────────────────────────────
    $(document).on('click', '.langs-desktop p, .langs p', function () {
        $(this).toggleClass('active');
        var lang   = $(this).text();
        var $form  = $(this).closest('form');
        var $input = $form.find('.hidden-input');
        var cur    = $input.val();
        if ($(this).hasClass('active')) {
            $input.val((lang + ' ' + cur).trim());
        } else {
            $input.val(cur.replace(lang, '').replace(/\s+/g, ' ').trim());
        }
    });

    // ── AJAX submission ────────────────────────────────────────────────────
    function pbSubmit($form) {
        var $parent  = $form.closest('.form_validation_parent');
        var $success = $parent.find('.contact_success_message');
        var $fail    = $parent.find('.contact_fail_message');

        pbClearErrors($form);
        $success.hide();
        $fail.hide();

        if (!pbValidate($form, $form)) {
            return;
        }

        $form.find('[type="submit"]').prop('disabled', true).addClass('disabled');

        $.ajax({
            url:  '<?php echo esc_js( admin_url( 'admin-ajax.php' ) ); ?>',
            type: 'POST',
            data: $form.serialize() + '&action=polyblog_contact',
            success: function (res) {
                if (res.success) {
                    $success.html(res.data.message).slideDown(300);
                    $form[0].reset();
                    $form.find('.langs p, .langs-desktop p').removeClass('active');
                    $form.find('.hidden-input').val('');
                    if (swiperMobileContactForm) {
                        swiperMobileContactForm.slideTo(0);
                    }
                } else if (res.data && res.data.errors) {
                    $.each(res.data.errors, function (name, msg) {
                        $form.find('.pb-error[data-for="' + name + '"]').text(msg);
                    });
                    $fail.html('Please fix the errors above.').slideDown(300);
                } else {
                    $fail.html((res.data && res.data.message) || 'An error occurred. Please try again.').slideDown(300);
                }
            },
            error: function () {
                $fail.html('An error occurred. Please try again.').slideDown(300);
            },
            complete: function () {
                $form.find('[type="submit"]').prop('disabled', false).removeClass('disabled');
            }
        });
    }

    $('#polyblog-contact-desktop, #polyblog-contact-mobile').on('submit', function (e) {
        e.preventDefault();
        pbSubmit($(this));
    });
});
</script>