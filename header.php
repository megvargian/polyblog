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
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site main_page_wrapper">
		<script>
			jQuery(document).ready(function ($) {
			});
		</script>
		<div id="content" class="site-content">
			<a href="http://polybloglb.com/">
				<img class="w-100 d-block"
					src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/politics-not-news.png"
					alt="Politics, not news.">
			</a>
			<button id="menu-button" class="responsive-menu-button" data-bs-toggle="modal"
				data-bs-target="#sideMenuModal">
				<img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/menu-orange.svg" alt="Menu" />
			</button>
			<div <?php echo is_front_page() ? 'class="home-video-header-container"' : ''; ?>>
				<?php if (is_front_page()) { ?>
					<div class="video-container">
						<video class="video" width="100%" height="100%" autoplay loop muted>
							<source src="<?php echo esc_url($header_video_url); ?>" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					<?php } ?>
					<div <?php echo is_front_page() ? 'class="row header-button-container-with-video"' : 'class="row header-button-container-without-video"'; ?>>
						<div class="col">
							<a href="http://polybloglb.com/" target="_blank">
								<img class="w-100 d-block"
									src="http://polybloglb.com/wp-content/uploads/2024/10/what_we_think.png"
									alt="What we think">
							</a>
						</div>
						<div class="col">
							<a href="http://polybloglb.com/" target="_blank">
								<img class="w-100 d-block"
									src="http://polybloglb.com/wp-content/uploads/2024/10/how_we_see_it.png"
									alt="How we see it">
							</a>
						</div>
						<div class="col">
							<a href="http://polybloglb.com/" target="_blank">
								<img class="w-100 d-block"
									src="http://polybloglb.com/wp-content/uploads/2024/10/our_segments.png"
									alt="Our segments">
							</a>
						</div>
						<div class="col">
							<a href="http://polybloglb.com/" target="_blank">
								<img class="w-100 d-block"
									src="http://polybloglb.com/wp-content/uploads/2024/10/out_productions.png"
									alt="Our productions">
							</a>
						</div>
						<div class="col">
							<a href="http://polybloglb.com/" target="_blank">
								<img class="w-100 d-block"
									src="http://polybloglb.com/wp-content/uploads/2024/10/get_to_know_us.png"
									alt="Get to know us">
							</a>
						</div>
					</div>
					<?php if (is_front_page()) { ?>
					</div>
				<?php } ?>
			</div>
			<div class="modal fade side-menu-modal" id="sideMenuModal" tabindex="-1" aria-labelledby="side-menu-modal"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							...
						</div>
					</div>
				</div>
			</div>