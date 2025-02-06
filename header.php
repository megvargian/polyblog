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

$header_video_url = get_field('header_video', 'option');

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
	<div id="page" class="site main_page_wrapper">
		<div id="content" class="site-content position-relative">
			<div class="site-title">
				<a href="http://polybloglb.com/">
					<p class="en">Politics, not news</p>
					<div class="white-line d-none d-lg-flex"></div>
					<p class="ar">سيــاسة، مـش اخبـار</p>
				</a>
				<div class="white-line d-block d-lg-none"></div>
			</div>
			<button id="menu-button" class="responsive-menu-button menu_mobile_nav" data-bs-toggle="modal" data-bs-target="#sideMenuModal">
				<p>on the agenda</p>
				<img class="arrow-right" src="<?php echo get_template_directory_uri(); ?>/inc/assets/icons/black-arrow.svg" alt="on the agenda">
			</button>
			<div id="home-video-header-container" <?php echo is_front_page() ? 'class="home-video-header-container"' : ''; ?>>
				<?php if (is_front_page()) { ?>
					<div class="video-container">
						<video class="video" width="100%" autoplay loop muted>
							<source src="<?php echo esc_url($header_video_url); ?>" type="video/mp4">
							Your browser does not support the video tag.
						</video>
						<div <?php echo is_front_page() ? 'class="row header-button-container-with-video"' : 'class="row header-button-container-without-video"'; ?>>
							<div class="col d-flex justify-content-center align-items-center">
								<a href="https://polybloglb.com/category/what-we-think/" target="_blank">
									<div class="bg-black">
										<p class="en">what we think</p>
										<p class="ar">شــــــو منفكــــــر</p>
									</div>
								</a>
							</div>
							<div class="col d-flex justify-content-center align-items-center">
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
								<a href="http://polybloglb.com/" target="_blank">
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
							</div>
						</div>
					<?php } ?>
					<?php if (is_front_page()) { ?>
					</div>
				<?php } ?>
			</div>
			<!-- <div class="modal fade side-menu-modal" id="sideMenuModal" tabindex="-1" aria-labelledby="side-menu-modal"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<button>
								<img src="http://polybloglb.com/wp-content/uploads/2024/12/what_we_think2.png" alt="What we think">
							</button>
							<button>
								<img src="http://polybloglb.com/wp-content/uploads/2024/12/get_to_know_us2.png" alt="get to know us">
							</button>
							<button>
								<img src="http://polybloglb.com/wp-content/uploads/2024/12/how_we_see_it2.png" alt="how we see it">
							</button>
							<button>
								<img src="http://polybloglb.com/wp-content/uploads/2024/12/our_productions2.png" alt="our productions">
							</button>
							<button>
								<img src="http://polybloglb.com/wp-content/uploads/2024/12/our_segments2.png" alt="our segments">
							</button>
						</div>
					</div>
				</div>
			</div> -->
			<div id="menu_mobile" class="menu_on_mobile d-block d-lg-none">
                <div class="menu_on_mobile_wrapper">
                    <div class="menu_on_mobile_inner_wrapper" style="position: relative;">
                        <div>
                            <?php //foreach($header_fields as $key => $menu_item){
                                    //if($menu_item['general_image'] == '' && $menu_item['has_child'] == false){?>
							<a class="d-block my-3 page_font animated_menu_el" href="https://polybloglb.com/category/what-we-think/">
								<div class="menu_item">
									<?php //echo $menu_item['label']?>
									<div class="bg-black">
										<p class="en">what we think</p>
										<p class="ar">شــــــو منفكــــــر</p>
									</div>
								</div>
							</a>
							<a class="d-block my-3 page_font animated_menu_el" href="https://polybloglb.com/category/how-we-see-it/">
								<div class="menu_item">
									<?php //echo $menu_item['label']?>
									<div class="bg-black">
										<p class="en">how we see it</p>
										<p class="ar">كيــف منشــوف</p>
									</div>
								</div>
							</a>
							<a class="d-block my-3 page_font animated_menu_el" href="<?php //echo $menu_item['url'] ?>">
								<div class="menu_item">
									<?php //echo $menu_item['label']?>
									<div class="bg-black">
										<p class="en">Our segments</p>
										<p class="ar">فقـــــــــــــــــراتنا </p>
									</div>
								</div>
							</a>
							<a class="d-block my-3 page_font animated_menu_el" href="<?php //echo $menu_item['url'] ?>">
								<div class="menu_item">
									<?php //echo $menu_item['label']?>
									<div class="bg-black">
										<p class="en">our productions</p>
										<p class="ar">انـــــــــتاجــــــــاتــــــنا</p>
									</div>
								</div>
							</a>
							<a class="d-block my-3 page_font animated_menu_el" href="<?php //echo $menu_item['url'] ?>">
								<div class="menu_item">
									<?php //echo $menu_item['label']?>
									<div class="bg-black">
										<p class="en">GET TO KNOW US</p>
										<p class="ar">تعـــــــرف/ي علينـــا </p>
									</div>
								</div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
			<?php if(!(is_front_page() || ( is_single() && get_post_type() === 'post' ))){ ?>
				<div class="d-lg-block d-none side-header">
					<div class="d-flex justify-content-center align-items-center main-side-button">
						<img class="side-header-arrow" src="<?php echo get_template_directory_uri();?>/inc/assets/icons/side-header-arrow.svg" alt="side-header-arrow">
					</div>
					<div class="side-header-menu">
						<ul>
							<li class="single-side-header d-block">
								<a href="https://polybloglb.com/category/what-we-think/">
									<p class="en-regular">what we think</p>
									<p class="ar-regualr">شــــــو منفكــــــر</p>
								</a>
							</li>
							<li class="single-side-header d-block">
								<a href="https://polybloglb.com/category/how-we-see-it/">
									<p class="en-regular">how we see it</p>
									<p class="ar-regular">كيــف منشــوف</p>
								</a>
							</li>
							<li class="single-side-header d-block">
								<a href="http://polybloglb.com/our-segements">
									<p class="en-regular">Our segments</p>
									<p class="ar-regular">فقـــــــــــــــــراتنا </p>
								</a>
							</li>
							<li class="single-side-header d-block">
								<a href="http://polybloglb.com/">
									<p class="en-regular">our productions</p>
									<p class="ar-regular">انـــــــــتاجــــــــاتــــــنا</p>
								</a>
							</li>
							<li class="single-side-header d-block">
								<a href="http://polybloglb.com/">
									<p class="en-regular">GET TO KNOW US</p>
									<p class="ar-regular">تعـــــــرف/ي علينـــا </p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			<?php } ?>
<script>
	jQuery(document).ready(function ($) {
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
	});
</script>