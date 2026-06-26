<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

$header_fields = get_fields('options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2YNP450RWN"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2YNP450RWN');
    </script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php
    // $current_lang = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'ar';
    $current_lang = 'en';
    if ( $current_lang === 'en' ) {
        $meta_description = 'Deep analytical coverage of Lebanese politics, state sovereignty, and regional security. Expert analysis on governance, geopolitics, and policy impact.';
        $meta_keywords    = 'Lebanon, Lebanese, politics, news, political, analysis, governance, Middle East, policy, state, sovereignty, security, regional, geopolitics, south, war, government, Joseph Aoun, Nawaf Salam, Nabih Berri, Parliament, beirut, tripoli';
    } else {
        $meta_description = 'تغطية تحليلية معمّقة للسياسة اللبنانية، وسيادة الدولة، والأمن الإقليمي. تحليلات متخصصة حول الحوكمة، والجيوسياسة، وتأثير السياسات العامة.';
        $meta_keywords    = 'لبنان، لبناني، سياسة، أخبار، تحليل سياسي، حوكمة، الشرق الأوسط، سياسات عامة، الدولة، السيادة، الأمن، إقليمي، جيوسياسة، الجنوب، الحرب، الحكومة، جوزيف عون، نواف سلام، نبيه بري، البرلمان، بيروت، طرابلس';
    }
    ?>
    <meta name="description" content="<?php echo esc_attr( $meta_description ); ?>">
    <meta name="keywords" content="<?php echo esc_attr( $meta_keywords ); ?>">

    <?php
    // --- Open Graph & Twitter Card meta tags for social media sharing ---
    $og_site_name    = get_bloginfo('name');
    $og_url          = esc_url( ( is_ssl() ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
    $og_type         = 'website';
    $og_title        = get_bloginfo('name');
    $og_description  = $meta_description;
    $og_image        = '';
    $og_image_width  = '';
    $og_image_height = '';

    if ( is_singular('post') ) {
        // Single article page
        setup_postdata( $GLOBALS['post'] );
        $og_type        = 'article';
        $og_title       = get_the_title();
        $og_url         = get_permalink();
        $raw_excerpt    = get_the_excerpt();
        $og_description = $raw_excerpt ? wp_strip_all_tags( $raw_excerpt ) : $meta_description;

        if ( has_post_thumbnail() ) {
            $thumb      = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            $og_image        = $thumb[0];
            $og_image_width  = $thumb[1];
            $og_image_height = $thumb[2];
        }
    } elseif ( is_singular('authors') ) {
        // Single author page
        $og_type        = 'profile';
        $og_title       = get_the_title();
        $og_url         = get_permalink();
        $author_fields  = get_fields();
        // Use bio fields if available, fall back to site description
        $bio_en = isset($author_fields['author_bio_en']) ? $author_fields['author_bio_en'] : '';
        $bio_ar = isset($author_fields['author_bio_ar']) ? $author_fields['author_bio_ar'] : '';
        $bio    = $bio_en ? $bio_en : ( $bio_ar ? $bio_ar : '' );
        $og_description = $bio ? wp_strip_all_tags( $bio ) : $meta_description;

        if ( has_post_thumbnail() ) {
            $thumb           = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            $og_image        = $thumb[0];
            $og_image_width  = $thumb[1];
            $og_image_height = $thumb[2];
        }
    }

    // Fallback: use site logo or first available image
    if ( ! $og_image ) {
        $custom_logo_id = get_theme_mod('custom_logo');
        if ( $custom_logo_id ) {
            $logo_src = wp_get_attachment_image_src( $custom_logo_id, 'full' );
            if ( $logo_src ) {
                $og_image = $logo_src[0];
            }
        }
    }
    ?>

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type"        content="<?php echo esc_attr( $og_type ); ?>">
    <meta property="og:url"         content="<?php echo esc_url( $og_url ); ?>">
    <meta property="og:site_name"   content="<?php echo esc_attr( $og_site_name ); ?>">
    <meta property="og:title"       content="<?php echo esc_attr( $og_title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $og_description ); ?>">
    <?php if ( $og_image ) : ?>
    <meta property="og:image"       content="<?php echo esc_url( $og_image ); ?>">
    <?php if ( $og_image_width )  : ?><meta property="og:image:width"  content="<?php echo esc_attr( $og_image_width ); ?>"><?php endif; ?>
    <?php if ( $og_image_height ) : ?><meta property="og:image:height" content="<?php echo esc_attr( $og_image_height ); ?>"><?php endif; ?>
    <meta property="og:image:alt"   content="<?php echo esc_attr( $og_title ); ?>">
    <?php endif; ?>

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="<?php echo esc_attr( $og_title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $og_description ); ?>">
    <?php if ( $og_image ) : ?>
    <meta name="twitter:image"       content="<?php echo esc_url( $og_image ); ?>">
    <meta name="twitter:image:alt"   content="<?php echo esc_attr( $og_title ); ?>">
    <?php endif; ?>
    <!-- End social meta tags -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site main_page_wrapper position-relative">
        <div id="content" class="site-content ">
            <div class="site-title">
                <a href="http://polybloglb.com/">
                    <p class="en"><?php echo $header_fields['header_top_headline']['en_text']; ?></p>
                    <div class="white-line d-none d-lg-flex"></div>
                    <p class="ar"><?php echo $header_fields['header_top_headline']['ar_text']; ?></p>
                </a>
                <div class="white-line d-block d-lg-none"></div>
            </div>
            <div id="menu-button" class="responsive-menu-button menu_mobile_nav">
                <div class="en-regular-button">Menu</div>
                <img class="arrow-right"
                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/black-arrow.svg"
                    alt="Menu">
            </div>
            <div id="home-video-header-container"
                <?php echo is_front_page() ? 'class="home-video-header-container"' : ''; ?>>
                <?php if (is_front_page()) { ?>
                <div class="video-container">
                    <video class="video" width="100%" autoplay loop muted>
                        <source src="<?php echo esc_url($header_fields['header_video']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div
                        <?php echo is_front_page() ? 'class="row header-button-container-with-video"' : 'class="row header-button-container-without-video"'; ?>>
                        <?php foreach ($header_fields['header_menu'] as $menu_item) {?>
                        <div class="col d-flex justify-content-center align-items-center">
                            <a href="<?php echo $menu_item['menu_item']['url']; ?>" target="_blank">
                                <div class="bg-black">
                                    <p class="en"><?php echo $menu_item['menu_item']['en_text']; ?></p>
                                    <p class="ar"><?php echo $menu_item['menu_item']['ar_text']; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                        <div class="col d-flex justify-content-center align-items-center">
                            <a href="https://polybloglb.com/category/on-the-side/" target="_blank">
                                <div class="bg-black">
                                    <p class="en">On the side</p>
                                    <p class="ar">عَ الهامش</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (is_front_page()) { ?>
                </div>
                <?php } ?>
            </div>
            <div id="menu_mobile" class="menu_on_mobile d-block d-lg-none">
                <div class="menu_on_mobile_wrapper">
                    <div class="menu_on_mobile_inner_wrapper" style="position: relative;">
                        <div>
                            <?php foreach($header_fields['header_menu'] as $key => $menu_item){ ?>
                            <a class="d-block my-3 page_font animated_menu_el"
                                href="<?php echo $menu_item['menu_item']['url']; ?>">
                                <div class="menu_item">
                                    <div class="bg-black">
                                        <p class="en"><?php echo $menu_item['menu_item']['en_text']; ?></p>
                                        <p class="ar"><?php echo $menu_item['menu_item']['ar_text']; ?></p>
                                    </div>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!( is_single() && get_post_type() === 'post' )){ ?>
            <?php if (is_front_page()) { ?>
            <div id="scrollDiv">
                <?php } ?>
                <div class="d-lg-block d-none side-header">
                    <div class="d-flex justify-content-center align-items-center main-side-button">
                        <img class="side-header-arrow"
                            src="<?php echo get_template_directory_uri();?>/inc/assets/icons/side-header-arrow.svg"
                            alt="side-header-arrow">
                    </div>
                    <div class="side-header-menu">
                        <ul>
                            <?php foreach($header_fields['header_menu'] as $key => $menu_item){ ?>
                            <li class="single-side-header d-block">
                                <a href="<?php echo $menu_item['menu_item']['url']; ?>">
                                    <p class="en-regular"><?php echo $menu_item['menu_item']['en_text']; ?></p>
                                    <p class="ar-regualr"><?php echo $menu_item['menu_item']['ar_text']; ?></p>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php if (is_front_page()) { ?>
            </div>
            <?php } ?>
            <?php } ?>
            <script>
            jQuery(document).ready(function($) {
                $('#menu-button').click(function() {
                    $(this).toggleClass('active');
                    $('html, body').toggleClass('hide_scroll');
                    $('.menu_on_mobile').toggleClass('active');
                    $('.menu_on_mobile').toggleClass('visible');
                    $(".arrow-right").toggleClass('active');
                });
                $('.main-side-button').click(function() {
                    $('.side-header-arrow').toggleClass('active');
                    $('.side-header-menu').toggleClass('active');
                });
                $(".our-production-button").click(function(e) {
                    <?php if(is_front_page()){?>
                    e.preventDefault(); // Prevent default anchor behavior
                    $('#menu-button').removeClass('active');
                    $('html, body').removeClass('hide_scroll');
                    $('.menu_on_mobile').removeClass('active');
                    $('.menu_on_mobile').removeClass('visible');
                    $(".arrow-right").removeClass('active');
                    $('.side-header-arrow').removeClass('active');
                    $('.side-header-menu').removeClass('active');
                    let target = $(".youtube-playlist-bg"); // The section to scroll to
                    $("html, body").animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        target.addClass("highlight"); // Add class after scrolling
                    });
                    <?php }?>
                });
                const button = document.getElementById('menu-button');
                const initialPosition = button.offsetTop;
                let lastScrollTop = 0;
                window.addEventListener('scroll', () => {
                    const currentScroll = window.scrollY;

                    if (currentScroll > initialPosition) {
                        button.classList.add('fixed-menu-button');
                    } else {
                        button.classList.remove('fixed-menu-button');
                    }

                    if (currentScroll < lastScrollTop) {
                        button.classList.remove('fixed-button');
                    }

                    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;

                    if ($(window).scrollTop() > $(window).height()) {
                        $("#scrollDiv").fadeIn();
                    } else {
                        $("#scrollDiv").fadeOut();
                    }
                });
            });
            </script>