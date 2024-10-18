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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page" class="site main_page_wrapper">
	<script>
		jQuery(document).ready(function($) {
        });
    </script>
	<div id="content" class="site-content">
	<div class="header-container">
		<img class="w-100 d-block" src="http://polybloglb.com/wp-content/uploads/2024/10/politics_not_news.png" alt="Politics, not news.">
		<div class="video-container">
			test
		</div>
	</div>