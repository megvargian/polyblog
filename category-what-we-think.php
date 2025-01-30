<?php get_header(); ?>
<div class="container what-we-think-container">
    <div class="row">
        <div class="col">
            <img class="header" src="https://polybloglb.com/wp-content/uploads/2025/01/what-we-think.png" alt="what we think" />
        </div>
    </div>
    <div class="row my-2">
        <div class="col search-input">
            <div class="div input-with-icon">
                <input placeholder="Search bar" />
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.75 11.0833C4.75 10.2089 5.45889 9.5 6.33333 9.5H31.6667C32.5411 9.5 33.25 10.2089 33.25 11.0833C33.25 11.9578 32.5411 12.6667 31.6667 12.6667H6.33333C5.45889 12.6667 4.75 11.9578 4.75 11.0833ZM9.5 19C9.5 18.1255 10.2089 17.4167 11.0833 17.4167H26.9167C27.7911 17.4167 28.5 18.1255 28.5 19C28.5 19.8745 27.7911 20.5833 26.9167 20.5833H11.0833C10.2089 20.5833 9.5 19.8745 9.5 19ZM14.25 26.9167C14.25 26.0422 14.9589 25.3333 15.8333 25.3333H22.1667C23.0411 25.3333 23.75 26.0422 23.75 26.9167C23.75 27.7911 23.0411 28.5 22.1667 28.5H15.8333C14.9589 28.5 14.25 27.7911 14.25 26.9167Z" fill="black" />
                </svg>

            </div>
        </div>
    </div>
    <div class="what-we-think-posts">
        <div class="row my-4">
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
                                        <a href="<?php echo $author_link; ?>">
                                            <h4 class="align-text-arabic"><strong><?php echo $author_name; ?></strong></h4>
                                        </a>
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
        <div class="row my-4">
        <?php endif; ?>
    <?php endwhile; ?>
<?php else : ?>
    <p>No posts found in this category.</p>
<?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>