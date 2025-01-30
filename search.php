<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section>
	<!-- #primary -->
<?php
$search_term = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

$args = array(
	'post_type' => 'post',
	's' => $search_term,
	'cat' => get_category_by_slug('what-we-think')->term_id,
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
	<div class="what-we-think-posts">
		<div class="row my-4">
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<div class="col-md-6 my-2">
					<div class="card">
						<?php
						$article_thumbnail = get_field('article_thumbnail');
						if ($article_thumbnail) : ?>
							<div class="card-img-top">
								<a href="<?php the_permalink(); ?>">
									<img class="thumbnail" src="<?php echo esc_url($article_thumbnail); ?>" alt="<?php the_title(); ?>" class="img-fluid">
								</a>
							</div>
						<?php endif; ?>
						<div class="card-body">
							<h5 class="card-title align-text-arabic">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h5>
							<div class="row mt-3">
								<div class="col-4 category-buttons">
									<div>
										<?php
										$categories = get_the_category();
										foreach ($categories as $category) {
											if ($category->slug == 'arabic' || $category->slug == 'english') {
										?>
												<button type="button" class="<?php echo $category->slug == 'english' ? 'english' : 'arabic'; ?>">
													<strong><?php echo $category->slug == 'english' ? 'EN' : 'ع'; ?></strong>
												</button>
										<?php
											}
										}
										?>
									</div>
									<p class="article-date">
										<?php echo get_the_date('d/m/Y'); ?>
									</p>
								</div>
								<?php
                                    $author = get_field('author');
                                ?>
								<div class="col-5 author-info">
									<a href="<?php echo get_permalink(get_field('author')); ?>">
										<h4 class="align-text-arabic"><strong><?php get_the_title($author); ?></strong></h4>
									</a>
								</div>
								<div class="col-3">
									<img class="author-image" src="<?php echo get_the_post_thumbnail($author_profile); ?>" alt="<?php get_the_title($author); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ($query->current_post % 2 == 1) : ?>
		</div>
		<div class="row my-4">
		<?php endif; ?>
	<?php endwhile; ?>
		</div>
	</div>
<?php else : ?>
	<p>No posts found for this search.</p>
<?php endif;
wp_reset_postdata();
?>
<?php
get_footer();
