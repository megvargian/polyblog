<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<?php
$post_id = get_the_ID();
$author_post_id = get_field('author');
$author_id = get_post_field('post_author', $author_post_id);
$secondary_author_id = get_field('secondary_author', $post_id);
if($secondary_author_id) {
    $secondary_author_name = get_the_title($secondary_author_id);
    $secondary_author_link = get_permalink($secondary_author_id);
}
$author_name = get_the_title($author_post_id);
$author_link = get_permalink($author_post_id);
$categories = get_the_category();
$tags = get_the_tags() ?: [];
$languages = get_translations($post_id);
$header_fields = get_fields('options');
$get_mobile_image = get_field('mobile_feature_image');

if (have_posts()):
    while (have_posts()):
        the_post();
        $is_arabic    = preg_match('/[\x{0600}-\x{06FF}]/u', get_the_title());
        $content_dir   = $is_arabic ? 'rtl' : 'ltr';
        $content_align = $is_arabic ? 'text-right' : 'text-left';
        $content_font  = $is_arabic ? 'ar-bold' : 'en-bold';
        ?>
<?php if (has_post_thumbnail()): ?>
<div class="single-post-featured-image">
    <div class="row single-article-header-button-container">
        <?php foreach( (array) ($header_fields['header_menu'] ?? []) as $key => $menu_item){ ?>
        <div class="col d-flex justify-content-center align-items-center">
            <a href="<?php echo $menu_item['menu_item']['url']; ?>" target="_blank">
                <div class="bg-black">
                    <p class="en"><?php echo $menu_item['menu_item']['en_text']; ?></p>
                    <p class="ar"><?php echo $menu_item['menu_item']['ar_text']; ?></p>
                </div>
            </a>
        </div>
        <?php } ?>
        <!-- <div class="col d-flex justify-content-center align-items-center">
            <a href="https://polybloglb.com/category/how-we-see-it/" target="_blank">
                <div class="bg-black">
                    <p class="en">how we see it</p>
                    <p class="ar">كيــف منشــوف</p>
                </div>
            </a>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <a href="http://polybloglb.com/our-segements" target="_blank">
                <div class="bg-black">
                    <p class="en">Our segments</p>
                    <p class="ar">فقـــــــــــــــــراتنا </p>
                </div>
            </a>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <a href="http://polybloglb.com/#youtube-playlist-bg" target="_blank">
                <div class="bg-black">
                    <p class="en">our productions</p>
                    <p class="ar">انـــــــــتاجــــــــاتــــــنا</p>
                </div>
            </a>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <a href="http://polybloglb.com/" target="_blank">
                <div class="bg-black">
                    <p class="en">GET TO KNOW US</p>
                    <p class="ar">تعـــــــرف/ي علينـــا </p>
                </div>
            </a>
        </div> -->
    </div>
    <?php if ($get_mobile_image && isMob()) { ?>
    <img src="<?php echo esc_url($get_mobile_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
        class="mobile-feature-image w-100 d-block d-lg-none" />
    <div class="w-100 d-none d-lg-block">
        <?php the_post_thumbnail('full'); ?>
    </div>
    <?php } else if(isMob()) { ?>
    <div class="w-100">
        <?php the_post_thumbnail('full'); ?>
    </div>
    <?php } else { ?>
    <div class="w-100">
        <?php the_post_thumbnail('full'); ?>
    </div>
    <?php } ?>

</div>
<?php endif; ?>
<div class="container-fluid px-4 single-post-container">
    <div class="row py-2">
        <div class="col">
            <?php foreach ($categories as $category) {
                        if ($category->slug === 'what-we-think' || $category->slug === 'what-we-think-en') { ?>
            <a href="https://polybloglb.com/category/what-we-think/" type="button" class="what-we-think w-100"><span
                    class="english"><strong>WHAT WE THINK</strong></span><span class="arabic"><strong>شــــــو
                        منفكــــــر</strong></span></a>
            <?php   }
                        if ($category->slug === 'how-we-see-it' || $category->slug === 'how-we-see-it-en') { ?>
            <a href="https://polybloglb.com/category/how-we-see-it/" type="button" class="what-we-think w-100"><span
                    class="english"><strong>HOW WE SEE IT</strong></span><span class="arabic"><strong>كيــف
                        منشــوف</strong></span></a>

            <?php }
                    } ?>

        </div>
    </div>
    <div class="row py-2">
        <div class="col">
            <h1 class="<?php echo $content_align . ' ' . $content_font; ?>" dir="<?php echo $content_dir; ?>">
                <?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row py-2 single-article-header-desktop">
        <div class="col-4 col-sm-3 category-buttons">
            <?php
                    if ($languages) {
                        foreach ($languages as $lang) {
                            $translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
                            if ($translated_id) {
                    ?>
            <a href="<?php echo $lang['url']; ?>" class="<?php echo $lang['code'] == 'ar' ? 'arabic' : 'english'; ?>">
                <?php echo esc_html($lang['code'] == 'ar' ? 'عربي' : 'ENGLISH'); ?>
            </a>
            <?php
                            }
                        }
                    }
                    ?>
            <?php
                    echo '<p class="published-date">' . get_the_date('d/m/Y') . '</p>';
                    ?>
        </div>
        <div class="col-8 col-sm-9">
            <div class="row">
                <?php if($secondary_author_id) { ?>
                    <div class="col author-tags-container">
                        <a href="<?php echo $secondary_author_link; ?>">
                            <h2 class="author-name">
                                <strong><?php echo $secondary_author_name; ?></strong>
                            </h2>
                        </a>
                    </div>
                    <div class="col-2">
                        <img class="author-image" src="<?php echo get_the_post_thumbnail_url($secondary_author_id); ?>"
                            alt="<?php echo $secondary_author_name; ?>" />
                    </div>
                <?php } ?>
                <div class="col author-tags-container">
                    <a href="<?php echo $author_link; ?>">
                        <h2 class="author-name">
                            <strong><?php echo $author_name; ?></strong>
                        </h2>
                    </a>
                    <div class="tags">
                        <p>
                            <?php
                                $total_tags = count($tags);
                                foreach ($tags as $index => $tag) {
                                    echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
                                    if ($index < $total_tags - 1) {
                                        echo ' / ';
                                    }
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <img class="author-image" src="<?php echo get_the_post_thumbnail_url($author_post_id); ?>"
                        alt="<?php echo $author_title ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="row py-2 single-article-header-mobile">
        <div class="col category-buttons">
            <?php
                    if ($languages) {
                        foreach ($languages as $lang) {
                            $translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
                            if ($translated_id) {
                    ?>
            <a href="<?php echo $lang['url']; ?>" class="<?php echo $lang['code'] == 'ar' ? 'arabic' : 'english'; ?>">
                <?php echo esc_html($lang['code'] == 'ar' ? 'ع' : 'EN'); ?>
            </a>
            <?php
                            }
                        }
                    }
                    ?>
        </div>
        <div class="col published-date">
            <?php
                    echo '<p>' . get_the_date('d/m/Y') . '</p>';
                    ?>
        </div>
    </div>
    <div class="row py-4 white-divider">
        <div class="col"></div>
    </div>
    <div class="row py-2 author-tags-container-mobile">
        <div class="col">
            <img class="author-image" src="<?php echo get_the_post_thumbnail_url($author_post_id); ?>"
                alt="<?php echo $author_title ?>" />
        </div>
        <div class="col author-info-container">
            <a href="<?php echo $author_link; ?>">
                <h2 class="author-name">
                    <strong><?php echo $author_name; ?></strong>
                </h2>
            </a>
            <div class="tags">
                <p>
                    <?php
                        $total_tags = count($tags);
                        foreach ($tags as $index => $tag) {
                            echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
                            if ($index < $total_tags - 1) {
                                echo ' / ';
                            }
                        }
                    ?>
                </p>
            </div>
        </div>
        <?php if($secondary_author_id) { ?>
            <div class="col">
                <img class="author-image" src="<?php echo get_the_post_thumbnail_url($secondary_author_id); ?>"
                    alt="<?php echo $secondary_author_name ?>" />
            </div>
            <div class="col author-info-container">
                <a href="<?php echo $secondary_author_link; ?>">
                    <h2 class="author-name">
                        <strong><?php echo $secondary_author_name; ?></strong>
                    </h2>
                </a>
            </div>
        <?php } ?>
    </div>
    <?php
        $share_url       = urlencode(get_permalink());
        $share_title     = urlencode(get_the_title());
        $share_text      = urlencode(get_the_title() . ' - ' . wp_strip_all_tags(get_the_excerpt()));
    ?>
    <div class="row py-2 single-post-share-row">
        <div class="col px-lg-5 px-2 d-flex justify-content-start">
            <div class="single-post-share-icons" role="group" aria-label="Share this article">
                <a href="https://wa.me/?text=<?php echo $share_text . '%20' . $share_url; ?>" target="_blank"
                    rel="noopener noreferrer" aria-label="Share on WhatsApp" class="single-post-share-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.28-1.38c1.45.79 3.08 1.21 4.71 1.21h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.51 2 12.04 2Zm5.79 14.02c-.24.68-1.4 1.32-1.93 1.4-.49.08-1.11.11-1.79-.11-.41-.13-.94-.31-1.62-.6-2.85-1.23-4.71-4.12-4.85-4.31-.14-.19-1.16-1.54-1.16-2.94 0-1.4.73-2.08 1-2.36.26-.28.57-.35.76-.35.19 0 .38 0 .55.01.18.01.41-.07.64.49.24.58.81 1.99.88 2.13.07.14.12.31.02.5-.1.19-.15.31-.29.48-.14.17-.3.38-.43.51-.14.14-.29.29-.13.57.17.28.75 1.24 1.61 2.01 1.11.99 2.04 1.3 2.32 1.44.28.14.44.12.6-.07.17-.19.71-.83.9-1.11.19-.28.38-.24.64-.14.26.1 1.66.78 1.94.92.28.14.47.21.53.33.07.12.07.71-.17 1.39Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank"
                    rel="noopener noreferrer" aria-label="Share on Facebook" class="single-post-share-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 21v-8.06h2.71l.4-3.15h-3.11V7.8c0-.91.25-1.53 1.56-1.53h1.66V3.46A22 22 0 0 0 14.09 3c-2.42 0-4.08 1.48-4.08 4.19v2.6H7.28v3.15h2.73V21h3.49Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>"
                    target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter"
                    class="single-post-share-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.24 2.75h3.06l-6.69 7.65 7.87 10.85h-6.16l-4.82-6.31-5.52 6.31H2.9l7.16-8.19L2.5 2.75h6.32l4.36 5.77 5.06-5.77Zm-1.07 16.66h1.7L7.9 4.49H6.08l11.09 14.92Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"
                    aria-label="Share on Instagram" class="single-post-share-icon single-post-share-instagram"
                    data-share-url="<?php echo esc_url(get_permalink()); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path style="fill:#FFFFFF" d="M256,49.471c67.266,0,75.233.257,101.8,1.469,24.562,1.121,37.9,5.224,46.778,8.674a78.052,78.052,0,0,1,28.966,18.845,78.052,78.052,0,0,1,18.845,28.966c3.45,8.877,7.554,22.216,8.674,46.778,1.212,26.565,1.469,34.532,1.469,101.8s-0.257,75.233-1.469,101.8c-1.121,24.562-5.225,37.9-8.674,46.778a83.427,83.427,0,0,1-47.811,47.811c-8.877,3.45-22.216,7.554-46.778,8.674-26.56,1.212-34.527,1.469-101.8,1.469s-75.237-.257-101.8-1.469c-24.562-1.121-37.9-5.225-46.778-8.674a78.051,78.051,0,0,1-28.966-18.845,78.053,78.053,0,0,1-18.845-28.966c-3.45-8.877-7.554-22.216-8.674-46.778-1.212-26.564-1.469-34.532-1.469-101.8s0.257-75.233,1.469-101.8c1.121-24.562,5.224-37.9,8.674-46.778A78.052,78.052,0,0,1,78.458,78.458a78.053,78.053,0,0,1,28.966-18.845c8.877-3.45,22.216-7.554,46.778-8.674,26.565-1.212,34.532-1.469,101.8-1.469m0-45.391c-68.418,0-77,.29-103.866,1.516-26.815,1.224-45.127,5.482-61.151,11.71a123.488,123.488,0,0,0-44.62,29.057A123.488,123.488,0,0,0,17.3,90.982C11.077,107.007,6.819,125.319,5.6,152.134,4.369,179,4.079,187.582,4.079,256S4.369,333,5.6,359.866c1.224,26.815,5.482,45.127,11.71,61.151a123.489,123.489,0,0,0,29.057,44.62,123.486,123.486,0,0,0,44.62,29.057c16.025,6.228,34.337,10.486,61.151,11.71,26.87,1.226,35.449,1.516,103.866,1.516s77-.29,103.866-1.516c26.815-1.224,45.127-5.482,61.151-11.71a128.817,128.817,0,0,0,73.677-73.677c6.228-16.025,10.486-34.337,11.71-61.151,1.226-26.87,1.516-35.449,1.516-103.866s-0.29-77-1.516-103.866c-1.224-26.815-5.482-45.127-11.71-61.151a123.486,123.486,0,0,0-29.057-44.62A123.487,123.487,0,0,0,421.018,17.3C404.993,11.077,386.681,6.819,359.866,5.6,333,4.369,324.418,4.079,256,4.079h0Z"/>
                        <path style="fill:#FFFFFF" d="M256,126.635A129.365,129.365,0,1,0,385.365,256,129.365,129.365,0,0,0,256,126.635Zm0,213.338A83.973,83.973,0,1,1,339.974,256,83.974,83.974,0,0,1,256,339.973Z"/>
                        <circle style="fill:#FFFFFF" cx="390.476" cy="121.524" r="30.23"/>
                        <script xmlns="http://www.w3.org/2000/svg"/>
                    </svg>
                </a>
                <a href="https://www.threads.net/intent/post?text=<?php echo $share_text . '%20' . $share_url; ?>"
                    target="_blank" rel="noopener noreferrer" aria-label="Share on Threads"
                    class="single-post-share-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-label="Threads" class="x1ypdohk x13dflua x11xpdln xus2keu xk4oym4" fill="none" height="100%" role="img" viewBox="0 0 192 192" width="100%"><path class="x19hqcy" d="M141.537 88.9883C140.71 88.5919 139.87 88.2104 139.019 87.8451C137.537 60.5382 122.616 44.905 97.5619 44.745C97.4484 44.7443 97.3355 44.7443 97.222 44.7443C82.2364 44.7443 69.7731 51.1409 62.102 62.7807L75.881 72.2328C81.6116 63.5383 90.6052 61.6848 97.2286 61.6848C97.3051 61.6848 97.3819 61.6848 97.4576 61.6855C105.707 61.7381 111.932 64.1366 115.961 68.814C118.893 72.2193 120.854 76.925 121.825 82.8638C114.511 81.6207 106.601 81.2385 98.145 81.7233C74.3247 83.0954 59.0111 96.9879 60.0396 116.292C60.5615 126.084 65.4397 134.508 73.775 140.011C80.8224 144.663 89.899 146.938 99.3323 146.423C111.79 145.74 121.563 140.987 128.381 132.296C133.559 125.696 136.834 117.143 138.28 106.366C144.217 109.949 148.617 114.664 151.047 120.332C155.179 129.967 155.42 145.8 142.501 158.708C131.182 170.016 117.576 174.908 97.0135 175.059C74.2042 174.89 56.9538 167.575 45.7381 153.317C35.2355 139.966 29.8077 120.682 29.6052 96C29.8077 71.3178 35.2355 52.0336 45.7381 38.6827C56.9538 24.4249 74.2039 17.11 97.0132 16.9405C119.988 17.1113 137.539 24.4614 149.184 38.788C154.894 45.8136 159.199 54.6488 162.037 64.9503L178.184 60.6422C174.744 47.9622 169.331 37.0357 161.965 27.974C147.036 9.60668 125.202 0.195148 97.0695 0H96.9569C68.8816 0.19447 47.2921 9.6418 32.7883 28.0793C19.8819 44.4864 13.2244 67.3157 13.0007 95.9325L13 96L13.0007 96.0675C13.2244 124.684 19.8819 147.514 32.7883 163.921C47.2921 182.358 68.8816 191.806 96.9569 192H97.0695C122.03 191.827 139.624 185.292 154.118 170.811C173.081 151.866 172.51 128.119 166.26 113.541C161.776 103.087 153.227 94.5962 141.537 88.9883ZM98.4405 129.507C88.0005 130.095 77.1544 125.409 76.6196 115.372C76.2232 107.93 81.9158 99.626 99.0812 98.6368C101.047 98.5234 102.976 98.468 104.871 98.468C111.106 98.468 116.939 99.0737 122.242 100.233C120.264 124.935 108.662 128.946 98.4405 129.507Z"/><script xmlns=""/></svg>
                </a>
            </div>
        </div>
    </div>
    <div class="row py-2 single-post-font-controls-row">
        <div class="col px-lg-5 px-2 d-flex justify-content-end">
            <div class="single-post-font-controls" role="group" aria-label="Text size controls">
                <button type="button" id="single-post-font-decrease" aria-label="Decrease text size">-</button>
                <span class="single-post-font-controls-label">A</span>
                <button type="button" id="single-post-font-increase" aria-label="Increase text size">+</button>
            </div>
        </div>
    </div>
    <div class="row py-2 px-lg-5 px-1 main-content" dir="<?php echo $content_dir; ?>">
        <div class="col p-lg-5 px-2 <?php echo $content_align; ?> single-post-readable-content">
            <div class="single-post-readable-content-inner">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="col-4 d-lg-block d-none"></div>
    </div>
    <div class="row py-4 white-divider">
        <div class="col"></div>
    </div>
    <div class="row publish-with-us-img">
        <div class="col">
            <a href="http://polybloglb.com/#contact-us-section"><img class="py-5"
                    src="https://polybloglb.com/wp-content/uploads/2026/06/publish-with-us.jpg.jpeg" /></a>
        </div>
    </div>
    <div class="row py-4 white-divider">
        <div class="col"></div>
    </div>
</div>
<?php
    $total_posts_query = new WP_Query(array(
        'author' => $author_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ));

    if ($total_posts_query->have_posts()):
        $total_posts = $total_posts_query->found_posts;
    endif;
?>
<script>
jQuery(document).ready(function($) {
    let authorPostsCount = 3;
    const MIN_FONT_SIZE = 14;
    const MAX_FONT_SIZE = 28;
    const FONT_SIZE_STEP = 2;
    const STORAGE_KEY = 'polyblog_single_post_font_size';
    const $content = $('.single-post-readable-content-inner');
    const $increaseButton = $('#single-post-font-increase');
    const $decreaseButton = $('#single-post-font-decrease');

    function clampFontSize(fontSize) {
        return Math.min(MAX_FONT_SIZE, Math.max(MIN_FONT_SIZE, fontSize));
    }

    function updateFontButtons(fontSize) {
        $increaseButton.prop('disabled', fontSize >= MAX_FONT_SIZE);
        $decreaseButton.prop('disabled', fontSize <= MIN_FONT_SIZE);
    }

    function applyFontSize(fontSize) {
        const clampedFontSize = clampFontSize(fontSize);
        $content.css('font-size', clampedFontSize + 'px');
        updateFontButtons(clampedFontSize);

        try {
            localStorage.setItem(STORAGE_KEY, String(clampedFontSize));
        } catch (error) {
            // Keep working even if storage is unavailable.
        }
    }

    if ($content.length) {
        const defaultFontSize = parseFloat($content.css('font-size')) || 18;
        let savedFontSize = defaultFontSize;

        try {
            const storedValue = parseFloat(localStorage.getItem(STORAGE_KEY));
            if (!isNaN(storedValue)) {
                savedFontSize = storedValue;
            }
        } catch (error) {
            // Ignore storage read errors.
        }

        applyFontSize(savedFontSize);

        $increaseButton.on('click', function() {
            const currentSize = parseFloat($content.css('font-size')) || defaultFontSize;
            applyFontSize(currentSize + FONT_SIZE_STEP);
        });

        $decreaseButton.on('click', function() {
            const currentSize = parseFloat($content.css('font-size')) || defaultFontSize;
            applyFontSize(currentSize - FONT_SIZE_STEP);
        });
    }

    $('.single-post-share-instagram').on('click', function(e) {
        e.preventDefault();
        const shareUrl = $(this).data('share-url');
        const openProfile = () => window.open('https://www.instagram.com/', '_blank', 'noopener,noreferrer');

        if (navigator.clipboard && shareUrl) {
            navigator.clipboard.writeText(shareUrl).then(function() {
                alert('Link copied! Paste it into your Instagram story or bio.');
                openProfile();
            }, openProfile);
        } else {
            openProfile();
        }
    });

    $('#single-post-load-more').on('click', function() {
        const button = $(this);
        const offset = button.data('offset');
        const currentPostId = <?php echo get_the_ID(); ?>;

        function countOccurrences(string, substring) {
            const matches = string.match(new RegExp(substring, 'g'));
            return matches ? matches.length : 0;
        }

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'single_post_load_more_posts',
                offset: offset,
                current_post_id: currentPostId,
            },
            success: function(response) {
                if (response) {
                    let totalPosts = <?php echo $total_posts; ?>;
                    $('#single-post-author-posts').append(response);
                    button.data('offset', offset + 3);

                    const numberOfPostsLoaded = countOccurrences(response,
                        'author-post-details-container');
                    authorPostsCount += numberOfPostsLoaded;

                    if (authorPostsCount === totalPosts - 1) {
                        button.hide();
                    }
                }
            }
        });
    });
});
</script>
<?php
    endwhile;
endif;
?>
<?php
get_footer();