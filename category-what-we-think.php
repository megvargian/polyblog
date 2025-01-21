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
                                    $author_post_id = get_field('author');
                                    $author_id = get_post_field('post_author', $author_post_id);
                                    $author_name = get_the_title($author_post_id);
                                    $author_image = get_field('author_profile', $author_post_id);
                                    $author_link = get_permalink($author_post_id);
                                    $tags = get_the_tags();
                                    ?>
                                    <div class="col-5 author-info">
                                        <a href="<?php echo author_link; ?>"><h4 class="align-text-arabic"><strong><?php echo $author_name; ?></strong></h4></a>
                                        <div class="tags">
                                            <p class="align-text-arabic">
                                                <?php
                                                $total_tags = count($tags);
                                                foreach ($tags as $index => $tag) {
                                                    echo esc_html($tag->name);
                                                    if ($index < $total_tags - 1) {
                                                        echo ' / ';
                                                    }
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <img class="author-image" src="<?php echo $author_image ?>" alt="<?php echo $author_title ?>" />
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