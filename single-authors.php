<?php
get_header();
$get_all_single_authors_fields = get_fields();
// get all articles assign to this author
$args = array(
    'post_type'         =>      'post',
    'posts_per_page'    =>      -1,
    'order'             =>      'DSC',
    'orderby'           =>      'date',
);
$query = new WP_Query($args);
$current_author_posts = array();
if ( $query -> have_posts() ) :
    while ( $query -> have_posts() ) : $query -> the_post();
        $post_custom_fields = get_fields(get_the_ID());
        if($post_custom_fields['author'] == $author_id ):
            array_push($current_author_posts, get_the_ID());
        endif;
    endwhile;
    wp_reset_postdata();// Restore original Post Data
endif;
?>
<section class="single-author-page">
    <div class="container">
        <div class="row pt-2 mb-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row text-left py-5">
            <div class="col-12">
                <div class="bg-black">
                    <h2>
                        <span class="en-bold">HOW WE SEE IT</span>
                        <span class="ar-bold">كيــــف منشـــوف</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row author-title">
            <div class="col-lg-4 col-12 px-md-0 px-5">
                <img class="d-block single-article-img"
                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/demo-profile.png" alt="">
            </div>
            <div class="col-lg-7 col-12 text-left justify-content-center d-flex align-items-center">
                <div class="pt-lg-0 pt-sm-4 pt-2">
                    <h1 class="text-lg-left text-center">
                        <span class="en-bold d-block">
                            <?php the_title(); ?>
                        </span>
                        <span class="ar-bold d-block">
                            <?php echo $get_all_single_authors_fields['ar_author_name']; ?>
                        </span>
                    </h1>
                    <p class="en-regular mt-2"><?php echo $get_all_single_authors_fields['author_title']; ?></p>
                </div>
            </div>
        </div>
        <div class="row text-left mt-4 mb-5 bg-black-sec mx-lg-0 mx-1">
            <div class="col-6 text-left">
                <h2 class="en-bold">
                    Articles
                </h2>
            </div>
            <div class="col-6 text-right">
                <h2 class="ar-bold">
                    مقالات
                </h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($current_author_posts as $article_id) {
                    $article_link = get_permalink($article_id);
                    $article_title = get_the_title($article_id);
                    $get_image = get_the_post_thumbnail_url( $article_id);
                    $get_excerpt = get_the_excerpt($article_id);

            ?>
            <div class="col-12 mb-5">
                <div class="authors-article">
                    <div class="row px-lg-5 px-3 py-3">
                        <div class="col-5">
                            <img class="d-block w-100" src="<?php echo $get_image; ?>"
                                alt="<?php echo $article_title; ?>">
                        </div>
                        <div class="col-7 d-flex justify-content-center align-items-center">
                            <div class="text-right">
                                <p class="ar-regular mb-5">
                                    <?php echo $get_excerpt; ?>
                                </p>
                                <a class="en-regular" href="<?php echo $article_link; ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12 mb-5">
                <div class="authors-article">
                    <div class="row px-lg-5 px-3 py-3">
                        <div class="col-5">
                            <img class="d-block w-100"
                                src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/single-author-article-img.png"
                                alt="">
                        </div>
                        <div class="col-7 d-flex justify-content-center align-items-center">
                            <div class="text-right">
                                <p class="ar-regular mb-5">لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن لا بد
                                    أن أوضح لك أن كل هذه الأفكار لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول لكن
                                    لا بد أن أوضح لك أن كل هذه الأفكار لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة
                                    حول لكن لا بد أن أوضح لك أن كل هذه الأفكار لكن لا بد أن أوضح لك أن كل هذه الأفكار
                                    المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه الأفكار لكن لا بد أن أوضح لك أن كل هذه
                                    الأفكار المغلوطة حول لكن لا بد أن أوضح لك أن كل هذه </p>
                                <a class="en-regular" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php } ?>
        </div>
        <div class="row py-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
        <div class="row publish-with-us-img justify-content-center">
            <div class="col-7 py-5">
                <a href="http://polybloglb.com">
                    <img class="w-100 d-block"
                        src="https://polybloglb.com/wp-content/uploads/2025/01/publishwithus.png" />
                </a>
            </div>
        </div>
        <div class="row pt-5 d-lg-flex d-none">
            <div class="col-12">
                <div class="white-line"></div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();