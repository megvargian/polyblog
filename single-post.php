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
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2c2.72 0 3.06.01 4.12.06 1.06.05 1.79.22 2.43.47.66.26 1.22.6 1.77 1.15.55.55.89 1.11 1.15 1.77.25.64.42 1.37.47 2.43.05 1.06.06 1.4.06 4.12s-.01 3.06-.06 4.12c-.05 1.06-.22 1.79-.47 2.43a4.9 4.9 0 0 1-1.15 1.77 4.9 4.9 0 0 1-1.77 1.15c-.64.25-1.37.42-2.43.47-1.06.05-1.4.06-4.12.06s-3.06-.01-4.12-.06c-1.06-.05-1.79-.22-2.43-.47a4.9 4.9 0 0 1-1.77-1.15 4.9 4.9 0 0 1-1.15-1.77c-.25-.64-.42-1.37-.47-2.43C2.01 15.06 2 14.72 2 12s.01-3.06.06-4.12c.05-1.06.22-1.79.47-2.43.26-.66.6-1.22 1.15-1.77A4.9 4.9 0 0 1 5.45.53C6.09.28 6.82.11 7.88.06 8.94.01 9.28 0 12 0Zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 8.25A3.25 3.25 0 1 1 12 6.75a3.25 3.25 0 0 1 0 6.5ZM17.5 5.7a1.17 1.17 0 1 1-2.34 0 1.17 1.17 0 0 1 2.34 0Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="https://www.threads.net/intent/post?text=<?php echo $share_text . '%20' . $share_url; ?>"
                    target="_blank" rel="noopener noreferrer" aria-label="Share on Threads"
                    class="single-post-share-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.5 11.28c-.09-4.53-2.61-7.13-7.02-7.16-3.32.02-5.66 1.5-6.86 4.32l1.83.79c.87-1.98 2.48-3.01 4.9-3.03 2.9.02 4.5 1.53 4.7 4.36-.98-.17-2.05-.22-3.19-.16-3.32.18-5.46 1.87-5.32 4.29.07 1.24.75 2.31 1.92 3.02 1.02.6 2.34.87 3.71.75 1.81-.15 3.15-.85 3.98-2.09.63-.94.96-2.1 1.03-3.53.65.4 1.14.92 1.42 1.55.48 1.06.51 2.8-.9 4.21-1.24 1.22-2.74 1.75-4.94 1.77-2.45-.02-4.29-.79-5.63-2.36C4.86 16.6 4.2 14.53 4.18 12c.02-2.53.68-4.6 1.95-6.02C7.47 4.4 9.31 3.63 11.76 3.61c2.45.02 4.29.8 5.62 2.38.65.77 1.14 1.71 1.46 2.79l1.87-.5c-.4-1.36-1.02-2.55-1.87-3.56C17.13 2.55 14.71 1.6 11.75 1.58c-2.96.02-5.4 1-7.05 2.86C3.15 6.24 2.34 8.79 2.32 12c.02 3.21.83 5.76 2.38 7.56 1.65 1.86 4.09 2.84 7.05 2.86 2.61-.02 4.63-.7 6.28-2.34 1.87-1.87 1.87-4.42 1.19-5.97-.47-1.07-1.33-1.92-2.72-2.56Zm-4.62 6.05c-1.51.09-3.08-.58-3.15-2-.05-1.06 1.02-2.05 3.17-2.16.4-.02.78-.03 1.15-.03.7 0 1.35.05 1.94.15-.17 2.72-1.41 3.94-3.11 4.04Z"
                            fill="currentColor" />
                    </svg>
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