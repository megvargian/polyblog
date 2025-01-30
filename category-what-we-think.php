<?php get_header(); ?>
<div class="container what-we-think-container">
    <div class="row">
        <div class="col">
            <img class="header" src="https://polybloglb.com/wp-content/uploads/2025/01/what-we-think.png" alt="what we think" />
        </div>
    </div>
    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/category/what-we-think/')); ?>">
        <div class="row my-2">
            <div class="col search-input">
                <div class="div input-with-icon">
                    <input name="s" id="searchInput" placeholder="Search bar" />
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.75 11.0833C4.75 10.2089 5.45889 9.5 6.33333 9.5H31.6667C32.5411 9.5 33.25 10.2089 33.25 11.0833C33.25 11.9578 32.5411 12.6667 31.6667 12.6667H6.33333C5.45889 12.6667 4.75 11.9578 4.75 11.0833ZM9.5 19C9.5 18.1255 10.2089 17.4167 11.0833 17.4167H26.9167C27.7911 17.4167 28.5 18.1255 28.5 19C28.5 19.8745 27.7911 20.5833 26.9167 20.5833H11.0833C10.2089 20.5833 9.5 19.8745 9.5 19ZM14.25 26.9167C14.25 26.0422 14.9589 25.3333 15.8333 25.3333H22.1667C23.0411 25.3333 23.75 26.0422 23.75 26.9167C23.75 27.7911 23.0411 28.5 22.1667 28.5H15.8333C14.9589 28.5 14.25 27.7911 14.25 26.9167Z" fill="black" />
                    </svg>
                </div>
                <button type="submit" id="searchButton" class="search-btn">
                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.0862 19.1051L25.375 25.375M21.75 12.6875C21.75 17.6925 17.6925 21.75 12.6875 21.75C7.68241 21.75 3.625 17.6925 3.625 12.6875C3.625 7.68241 7.68241 3.625 12.6875 3.625C17.6925 3.625 21.75 7.68241 21.75 12.6875Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
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
                                        <a href="<?php echo get_permalink($author); ?>">
                                            <h4 class="align-text-arabic"><strong><?php echo get_the_title($author); ?></strong></h4>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <img class="author-image" src="<?php echo get_the_post_thumbnail_url($author); ?>" alt="<?php echo get_the_title($author); ?>" />
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

</div>
<?php get_footer(); ?>
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        document.querySelector('.search-form').submit();
    });
</script>