<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<!-- <section id="primary" class="content-area col-sm-12 col-lg-8">
	<main id="main" class="site-main" role="main">

		<?php
		if (have_posts()) : ?>

			<header class="page-header">
			</header>

		<?php
			while (have_posts()) : the_post();
				get_template_part('template-parts/content', 'search');

			endwhile;

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif; ?>
	</main>
</section> -->

<div class="container what-we-think-container">
	<div class="row">
		<div class="col">
			<h1 class="search-page-title"><?php printf(esc_html__('Search Results for: %s', 'wp-bootstrap-starter'), '<span>' . get_search_query() . '</span>'); ?></h1>
		</div>
	</div>
	<?php
	$search_term = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
	$search_category = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : '';

	$args = array(
		'post_type' => 'post',
		's' => $search_term,
		'cat' => get_category_by_slug('what-we-think')->term_id,
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) : ?>
		<div class="category-posts">
			<div class="row my-4 desktop">
				<?php while ($query->have_posts()) : $query->the_post(); ?>
					<div class="category-card-desktop col-md-6 my-2">
						<div class="card">
							<?php
							$post_id = get_the_ID();
							$post_title = get_the_title($post_id);
							$article_thumbnail = get_field('article_thumbnail');
							$languages = get_translations($post_id);

							if ($article_thumbnail) : ?>
								<div class="card-img-top">
									<a href="<?php the_permalink(); ?>">
										<img class="thumbnail" src="<?php echo esc_url($article_thumbnail); ?>" alt="<?php the_title(); ?>" class="img-fluid">
									</a>
								</div>
							<?php endif; ?>
							<div class="card-body">
								<div class="card-content">
									<div class="row article-title">
										<div class="col">
											<h3><?php echo esc_html($post_title); ?></h3>
										</div>
									</div>
									<div class="row">
										<div class="col-4 category-buttons">
											<div class="row">
												<div class="col">
													<?php
													if ($languages) {
														foreach ($languages as $lang) {
															$translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
															if ($translated_id) {
													?>
																<button class="<?php echo $lang['code'] == 'ar' ? 'arabic' : 'english'; ?>">
																	<strong> <?php echo esc_html($lang['code'] == 'ar' ? 'ع' : 'EN'); ?></strong>
																</button>
													<?php
															}
														}
													}
													?>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<p class="article-date">
														<?php echo get_the_date('d/m/Y'); ?>
													</p>
												</div>
											</div>
										</div>
										<?php
										$author = get_field('author');
										?>
										<div class="col-5 author-info">
											<div class="row">
												<div class="col">
													<a href="<?php echo get_permalink($author); ?>">
														<h5 class="align-text-arabic"><strong><?php echo get_the_title($author); ?></strong></h5>
													</a>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<p class="tags align-text-arabic">tag 1 / tag 2 / tag 3</p>
												</div>
											</div>
										</div>
										<div class="col-3">
											<img class="author-image" src="<?php echo get_the_post_thumbnail_url($author); ?>" alt="<?php echo get_the_title($author); ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if ($query->current_post % 2 == 1) : ?>
			</div>
			<div class="row my-4 desktop">
			<?php endif; ?>
		<?php endwhile; ?>
			</div>
			<div class="row my-4 mobile">
				<div class="col">
					<div class="swiper mySwiper">
						<div class="swiper-wrapper">
							<?php while (have_posts()) : the_post(); ?>
								<div class="category-card-mobile swiper-slide">
									<div class="card">
										<?php
										$post_id = get_the_ID();
										$article_thumbnail = get_field('article_thumbnail');
										$languages = get_translations($post_id);

										if ($article_thumbnail) : ?>
											<div class="card-img-top">
												<a href="<?php the_permalink(); ?>">
													<img class="thumbnail" src="<?php echo esc_url($article_thumbnail); ?>" alt="<?php the_title(); ?>" class="img-fluid">
												</a>
											</div>
										<?php endif; ?>
										<div class="card-body">
											<div class="row article-title">
												<div class="col">
													<h3><?php echo esc_html($post_title); ?></h3>
												</div>
											</div>
											<div class="row">
												<div class="col-4 category-buttons">
													<div class="row">
														<div class="col">
															<?php
															if ($languages) {
																foreach ($languages as $lang) {
																	$translated_id = apply_filters('wpml_object_id', $post_id, 'post', false, $lang['code']);
																	if ($translated_id) {
															?>
																		<button class="<?php echo $lang['code'] == 'ar' ? 'arabic' : 'english'; ?>">
																			<strong> <?php echo esc_html($lang['code'] == 'ar' ? 'ع' : 'EN'); ?></strong>
																		</button>
															<?php
																	}
																}
															}
															?>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<p class="article-date">
																<?php echo get_the_date('d/m/Y'); ?>
															</p>
														</div>
													</div>
												</div>
												<?php
												$author = get_field('author');
												?>
												<div class="col-5 author-info">
													<div class="row">
														<div class="col">
															<a href="<?php echo get_permalink($author); ?>">
																<h6 class="align-text-arabic"><strong><?php echo get_the_title($author); ?></strong></h6>
															</a>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<p class="tags align-text-arabic">tag 1 / tag 2 / tag 3</p>
														</div>
													</div>
												</div>
												<div class="col-3">
													<img class="author-image" src="<?php echo get_the_post_thumbnail_url($author); ?>" alt="<?php echo get_the_title($author); ?>" />
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<p>No posts found for this search.</p>
	<?php endif;
	wp_reset_postdata();
	?>
</div>
<?php
get_footer(); ?>
<script>
	const swiper = new Swiper(".mySwiper", {
		effect: "cards",
		grabCursor: true,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
</script>