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
$author_name = get_the_title($author_post_id);
$author_link = get_permalink($author_post_id);
$categories = get_the_category();
$tags = get_the_tags() ?: [];
$languages = get_translations($post_id);
$header_fields = get_fields('options');

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
    <?php the_post_thumbnail('full'); ?>
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
                <div class="col-10 author-tags-container">
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