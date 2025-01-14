<?php
/**
 * HomePage Three Featured Articles Block Template
 * gets latest 3 published posts
 */

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
);

$query = new WP_Query($args);
?>
<section id="three-featured-articles-block" class="my-5 three-featured-articles-block-container">
    <div class="container">
        <div class="row position-relative z-1 p-lg-5 p-2">
            <?php
            $count=0;
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $article_title = get_the_title();
                    $article_link = get_permalink();
                    $categories = get_the_category();
                    $article_thumbnail = get_field('article_thumbnail', get_the_ID());
                    $count++;
                    ?>
                    <div class="col-4 p-3 article-container <?php echo $count === 1 ? 'hovered' : '' ?>">
                        <a class="position-relative" href="<?php echo $article_link; ?>" target="_blank">
                            <img src="<?php echo $article_thumbnail; ?>" alt="<?php echo $article_title; ?>">
                            <div class="hover-text">
                                <p>
                                    <?php echo $article_title; ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('.article-container').hover(
            function () {
            $(this).addClass('hovered'); // Add class on hover
            },
            function () {
            $(this).removeClass('hovered'); // Remove class when mouse leaves
            }
        );
    });
</script>