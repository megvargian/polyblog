<?php
/**
 * Template Name: Search Authors Page
 */

get_header();
?>
<section class="search-authors-page">
    <div class="container">
        <div class="row pt-2 mb-5">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row text-center py-5">
            <div class="col-12">
                <div class="bg-black">
                    <h1>
                        <span class="en-bold">MEET OUR VOICES</span>
                        <span class="ar-bold">تعـــــــــرف على أصــــــــــــــــــواتنا</span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <?php for($i=0; $i<15; $i++){ ?>
                <div class="col-4 text-center mb-4">
                    <div class="single-author-block d-flex justify-content-center align-items-center p-4">
                        <div>
                            <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/search-authors-img.png" alt="">
                            <h4 class="ar-bold pt-2">د. رمزي أبو اسماعيل</h4>
                            <p class="ar-regular">السياسة / الشرق الأوسط / الحرب</p>
                            <a class="mt-3 view-more-btn en-regular" href="#">View Profile</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
get_footer();
