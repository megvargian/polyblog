<?php get_header(); ?>
<div class="container what-we-think-container">
    <div class="row">
        <div class="col">
            <img class="header" src="https://polybloglb.com/wp-content/uploads/2025/01/what-we-think.png" alt="what we think" />
        </div>
    </div>
    <div class="row my-2">
        <div class="col">
            <input placeholder="Search" />
        </div>
    </div>
    <div class="what-we-think-posts">
        <div class="row my-2">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-6 my-2">
                        <div class="card">
                            <?php $article_thumbnail = get_field('article_thumbnail');
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
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                $category_links = [];
                                                foreach ($categories as $category) {
                                                    $category_links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                }
                                                echo implode(', ', $category_links);
                                            }
                                            ?>
                                            <p class="article-date">
                                                <?php echo get_the_date('d/m/Y'); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($wp_query->current_post % 2 == 1) : ?>
        </div>
        <div class="row my-2">
        <?php endif; ?>
    <?php endwhile; ?>
<?php else : ?>
    <p>No posts found in this category.</p>
<?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>