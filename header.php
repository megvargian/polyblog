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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
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
                <div class="en-regular-button">on the agenda</div>
                <img class="arrow-right"
                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/black-arrow.svg"
                    alt="on the agenda">
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
                });
            });
            </script>