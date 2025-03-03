<?php
/**
 * Template Name: Our Segments Page
 */

get_header();
$page_fields = get_fields();
?>
<section class="our-segments-page">
    <div class="container">
        <div class="row pt-2 mb-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row text-center py-5">
            <div class="col-12">
                <div class="bg-black">
                    <h1>
                        <span class="en-bold"><?php the_title(); ?></span>
                        <span class="ar-bold"><?php echo $page_fields['ar_title']; ?></span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
</section>
<?php
get_footer();
