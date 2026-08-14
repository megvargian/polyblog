<?php
/**
 * Template Name: Homepage
 */

get_header();
$header_fields = get_fields('option');
?>
<div class="video-container d-block d-md-none">
    <video class="video" width="100%" autoplay loop muted>
        <source src="<?php echo esc_url($header_fields['header_video']); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<?php
while ( have_posts() ) : the_post();
    the_content();
endwhile;
get_footer();
