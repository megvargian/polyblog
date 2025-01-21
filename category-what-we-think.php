<?php get_header(); ?>
<div class="container what-we-think-container">
    <div class="row">
        <div class="col">
            <img class="header" src="https://polybloglb.com/wp-content/uploads/2025/01/what-we-think.png" alt="what we think" />
        </div>
    </div>
    <div class="category-posts">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="row">
                    <div class="col">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No posts found in this category.</p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>