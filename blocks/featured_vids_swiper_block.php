<?php
/**
 * HomePage Featured Videos Swiper Block
 */

$yt_featured_vids_block = get_fields();
$slides = isset($yt_featured_vids_block['featured_video_slides']) && is_array($yt_featured_vids_block['featured_video_slides'])
	? $yt_featured_vids_block['featured_video_slides']
	: array();

$block_unique_id = 'featured-vids-swiper-' . wp_unique_id();
$block_prev_id = $block_unique_id . '-prev';
$block_next_id = $block_unique_id . '-next';
?>
<section class="w-100 featured-vids-swiper-block d-none d-lg-block">
	<div class="container-fluid featured-vids-swiper-inner">
		<div class="position-relative">
			<div id="<?php echo esc_attr($block_unique_id); ?>" class="swiper featured-vids-swiper-js">
				<div class="swiper-wrapper">
					<?php foreach ($slides as $slide) {
						$slide_image = isset($slide['image']) ? $slide['image'] : '';
						$slide_text = isset($slide['text']) ? $slide['text'] : '';
						$slide_url = isset($slide['link']) ? $slide['link'] : '';

						if (is_array($slide_image)) {
							$image_url = isset($slide_image['url']) ? $slide_image['url'] : '';
							$image_alt = isset($slide_image['alt']) ? $slide_image['alt'] : '';
						} elseif (is_numeric($slide_image)) {
							$image_url = wp_get_attachment_image_url((int) $slide_image, 'full');
							$image_alt = get_post_meta((int) $slide_image, '_wp_attachment_image_alt', true);
						} else {
							$image_url = $slide_image;
							$image_alt = '';
						}

						if (empty($image_url) || empty($slide_text) || empty($slide_url)) {
							continue;
						}
						?>
						<div class="swiper-slide">
							<article class="featured-vid-card">
								<a class="featured-vid-card-image-link position-relative d-block" href="<?php echo esc_url($slide_url); ?>" target="_blank" rel="noopener noreferrer">
									<img class="featured-vid-card-image" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt ?: $slide_text); ?>">
									<svg id="Layer_1" class="play-icon position-absolute" alt="play" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 449.9 500">
										<path class="st0" fill="#fff" d="M81.5,11.05C36.54-14.83,0,6.32,0,58.23v382.88c0,51.93,36.54,73.05,81.5,47.26l334.67-191.96c44.98-25.79,44.98-67.68,0-93.49L81.5,11.05ZM81.5,11.05"></path>
									</svg>
								</a>
								<div class="featured-vid-card-content">
									<h3 class="featured-vid-card-title"><?php echo esc_html($slide_text); ?></h3>
								</div>
							</article>
						</div>
					<?php } ?>
				</div>
			</div>
			<div id="<?php echo esc_attr($block_prev_id); ?>" class="swiper-button-prev featured-vids-swiper-prev"></div>
			<div id="<?php echo esc_attr($block_next_id); ?>" class="swiper-button-next featured-vids-swiper-next"></div>
		</div>
	</div>
</section>

<script>
jQuery(document).ready(function($) {
	var swiperSelector = '#<?php echo esc_js($block_unique_id); ?>';
	var slideCount = $(swiperSelector + ' .swiper-slide').length;

	if (slideCount === 0 || window.innerWidth < 992) {
		return;
	}

	var loopEnabled = slideCount > 4;

	new Swiper(swiperSelector, {
		slidesPerView: 4,
		spaceBetween: 24,
		loop: loopEnabled,
		speed: 900,
		autoplay: {
			delay: 2500,
			disableOnInteraction: false,
			pauseOnMouseEnter: true,
		},
		navigation: {
			nextEl: '#<?php echo esc_js($block_next_id); ?>',
			prevEl: '#<?php echo esc_js($block_prev_id); ?>',
		},
	});
});
</script>