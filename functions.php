<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */

if ( ! function_exists( 'wp_bootstrap_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_bootstrap_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-bootstrap-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wp-bootstrap-starter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_bootstrap_starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function wp_boostrap_starter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'wp_bootstrap_starter_setup' );


/**
 * Add Welcome message to dashboard
 */
function wp_bootstrap_starter_reminder(){
        $theme_page_url = 'https://afterimagedesigns.com/wp-bootstrap-starter/?dashboard=1';

            if(!get_option( 'triggered_welcomet')){
                $message = sprintf(__( 'Welcome to WP Bootstrap Starter Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'wp-bootstrap-starter' ),
                    esc_url( $theme_page_url )
                );

                printf(
                    '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
                    $message
                );
                add_option( 'triggered_welcomet', '1', '', 'yes' );
            }

}
add_action( 'admin_notices', 'wp_bootstrap_starter_reminder' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_starter_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_starter_scripts() {
	// load bootstrap css
	wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );

    // fontawesome cdn
    wp_enqueue_style( 'wp-bootstrap-pro-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/font-awsome.css' );
	// load bootstrap css

	// load WP Bootstrap Starter styles
	wp_enqueue_style( 'wp-bootstrap-starter-style', get_stylesheet_uri() );

    // ============= Load Custom stylesheets =============

    wp_enqueue_style( 'polyblog-swiper', get_template_directory_uri() . '/inc/assets/css/swiper.min.css' );

    wp_enqueue_style( 'polyblog-custom_style', get_template_directory_uri() . '/inc/assets/css/custom_style.css', array(), '1.40' );
    wp_enqueue_style( 'polyblog-responsive_style', get_template_directory_uri() . '/inc/assets/css/responsive.css', array(), '1.40' );


    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    // wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
	wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );

    // ========================================================================
    // Add all custom js libraries here
    wp_enqueue_script('polyblog-swiper-js', get_template_directory_uri() . '/inc/assets/js/swiper.min.js', array(), '1', true );

    // jquery visibale
    // wp_enqueue_script('queryvisible-js', get_template_directory_uri() . '/inc/assets/js/jquery.visible.js', array(), '1', true );
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts' );


function wp_bootstrap_starter_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wp-bootstrap-starter" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "wp-bootstrap-starter" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "wp-bootstrap-starter" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'wp_bootstrap_starter_password_form' );

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

// PHP Check if time is between two times regardless of date
function TimeIsBetweenTwoTimes($from, $till, $input) {
    $f = DateTime::createFromFormat('H:i', $from);
    $t = DateTime::createFromFormat('H:i', $till);
    $i = DateTime::createFromFormat('H:i', $input);
    if ($f > $t) $t->modify('+1 day');
    return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
}

function gutenberg_editor_assets() {
  // Load the theme styles within Gutenberg.
  wp_enqueue_style('my-gutenberg-editor-styles', get_theme_file_uri('/assets/gutenberg-editor-styles.css'), FALSE);
}
// Add backend styles for Gutenberg.
add_action('enqueue_block_editor_assets', 'gutenberg_editor_assets');

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a testimonial block.
        // the first one is a demo
        // acf_register_block_type(
        //     array(
        //         'name'              => 'Block1',
        //         'title'             => __('Block1'),
        //         'description'       => __('This is the first Block of Homepage'),
        //         'render_template'   => 'blocks/block_1.php',
        //         'category'          => 'formatting',
        //         'icon'              => 'admin-comments',
        //         'keywords'          => array('testimonial', 'quote'),
        //     )
        // );
        acf_register_block_type(
            array(
                'name'              => 'Bg Image Block',
                'title'             => __('Bg Image Block'),
                'description'       => __('This is the Background Image Block of Homepage'),
                'render_template'   => 'blocks/bg_img_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'YouTube Playlist Block',
                'title'             => __('YouTube Playlist Block'),
                'description'       => __('This is the YouTube Playlist Block of Homepage'),
                'render_template'   => 'blocks/yt_playlist_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
            );
        acf_register_block_type(
            array(
                'name'              => 'YouTube Featured Videos Block',
                'title'             => __('YouTube Featured Videos Block'),
                'description'       => __('This is the YouTube Featured Videos Block of Homepage'),
                'render_template'   => 'blocks/yt_featured_vids_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'featured-vids-swiper-block',
                'title'             => __('Featured Vids Swiper Block'),
                'description'       => __('Desktop-only featured videos swiper with image, title and link'),
                'render_template'   => 'blocks/featured_vids_swiper_block.php',
                'category'          => 'formatting',
                'icon'              => 'format-video',
                'keywords'          => array('featured', 'videos', 'swiper'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Message from Editor Block',
                'title'             => __('Message from Editor Block'),
                'description'       => __('This is the Message from Editor Block of Homepage'),
                'render_template'   => 'blocks/message_from_editor_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Contact us Block',
                'title'             => __('Contact us Block'),
                'description'       => __('This is the Contact us Block of Homepage'),
                'render_template'   => 'blocks/contactus_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Single featured article block',
                'title'             => __('Single featured article block'),
                'description'       => __('This is the Single featured article block of Homepage'),
                'render_template'   => 'blocks/single_featured_article_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Author Swiper Block',
                'title'             => __('Author Swiper Block'),
                'description'       => __('This is the Author Swiper Block of Homepage'),
                'render_template'   => 'blocks/author_swiper_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Author Block',
                'title'             => __('Author Block'),
                'description'       => __('This is the Author Block of Homepage'),
                'render_template'   => 'blocks/author_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Single Author Article Swiper Block',
                'title'             => __('Single Author Article Swiper Block'),
                'description'       => __('This is the Single Author Article Swiper Block of Homepage'),
                'render_template'   => 'blocks/single_author_article_swiper_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Three featured articles block',
                'title'             => __('Three featured articles block'),
                'description'       => __('This is the Three featured articles block of Homepage'),
                'render_template'   => 'blocks/three_featured_articles_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Our Segments Block One',
                'title'             => __('Our Segments Block One'),
                'description'       => __('This is the Block One of Our Segments'),
                'render_template'   => 'blocks/our-segments/Block_1.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Our Segments Block Two',
                'title'             => __('Our Segments Block Two'),
                'description'       => __('This is the Block Two of Our Segments'),
                'render_template'   => 'blocks/our-segments/Block_2.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Our Program Block',
                'title'             => __('Our Program Block'),
                'description'       => __('This is the Our Program Block'),
                'render_template'   => 'blocks/our-program_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
	}
}

// function get_total_author_posts($author_id) {
//     $author_posts_query = new WP_Query(array(
//         'author' => $author_id,
//         'post_type' => 'post',
//         'post_status' => 'publish',
//         'posts_per_page' => -1,
//     ));

//     if ($author_posts_query->have_posts()):
//         $total_posts = $author_posts_query->found_posts;
//         return $total_posts;
//     endif;
// }

function single_post_load_more_posts() {
    if (isset($_POST['offset'])) {
        $offset = intval($_POST['offset']);
        $current_post_id = isset($_POST['current_post_id']) ? intval($_POST['current_post_id']) : 0;

        $author_post_id = get_field('author', $current_post_id);
        $author_id = get_post_field('post_author', $author_post_id);

        $args = array(
            'author' => $author_id,
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'post__not_in' => array($current_post_id),
            'offset' => $offset
        );

        $query = new WP_Query($args);

        // $total_posts = get_total_author_posts($author_id);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $author_name = get_the_title($author_post_id);
                $author_post_featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $author_post_content_preview = wp_trim_words(get_the_content(), 20, '...');
                $author_post_publish_date = get_the_date('M. j, Y');
                ?>
<a href="<?php the_permalink(); ?>" target="_blank">
    <div class="row my-2 p-4 author-post-container align-text-arabic">
        <div class="col author-post-thumbnail-container">
            <img src="<?php echo esc_url($author_post_featured_image); ?>" />
        </div>
        <div class="col author-post-details-container">
            <div class="row">
                <div class="col">
                    <p class="title"><?php the_title(); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="preview"><?php echo esc_html($author_post_content_preview); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col details-container">
                    <small><?php echo $author_name; ?></small>
                    <small><?php echo esc_html($author_post_publish_date); ?></small>
                </div>
            </div>
        </div>
    </div>
</a>
<?php
            endwhile;
        else:
            echo '';
        endif;

        wp_reset_postdata();
    }

    die();
}

add_action('wp_ajax_single_post_load_more_posts', 'single_post_load_more_posts');
add_action('wp_ajax_nopriv_single_post_load_more_posts', 'single_post_load_more_posts');

function search_authors_load_more() {
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

    $args = array(
        'post_type'      => 'authors',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'offset'         => $offset,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        wp_send_json_success(array(
            'html'  => '',
            'count' => 0,
        ));
    }

    ob_start();
    $count = 0;

    while ($query->have_posts()) {
        $query->the_post();

        $author_id = get_the_ID();
        $get_title = get_the_title($author_id);
        $ar_title = get_field('ar_author_name', $author_id);
        $tags = get_the_tags($author_id);
        ?>
<div class="text-center mb-4 hovered-single-author">
    <div class="single-author-block d-flex justify-content-center align-items-center p-4">
        <div>
            <img class="d-block w-100" src="<?php echo get_the_post_thumbnail_url($author_id); ?>"
                alt="<?php echo esc_attr($get_title); ?>">
            <h4 class="ar-bold pt-2"><?php echo esc_html($ar_title); ?></h4>
            <?php if ($tags) { ?>
            <p class="ar-regular">
                <?php
                foreach ($tags as $tag) {
                    echo esc_html($tag->name) . '/';
                }
                ?>
            </p>
            <?php } ?>
            <a class="mt-3 view-more-btn en-regular" href="<?php echo get_permalink($author_id); ?>">View Profile</a>
        </div>
    </div>
</div>
<?php
        $count++;
    }

    wp_reset_postdata();

    wp_send_json_success(array(
        'html'  => ob_get_clean(),
        'count' => $count,
    ));
}

add_action('wp_ajax_search_authors_load_more', 'search_authors_load_more');
add_action('wp_ajax_nopriv_search_authors_load_more', 'search_authors_load_more');

function trim_words_with_limits($text, $word_limit = 20) {
    $words = wp_trim_words($text, $word_limit, '...');
    return $words;
}

function isMob(){
    return is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
}

function get_language_shortcode() {
    return apply_filters( 'wpml_current_language', null );
}
add_shortcode( 'language', 'get_language_shortcode' );

function get_translations($post_id){
    $post_id = (int) $post_id;
    if (!$post_id) {
        return array();
    }

    $post = get_post($post_id);
    if (!$post) {
        return array();
    }

    $element_type = 'post_' . $post->post_type;
    $trid = apply_filters('wpml_element_trid', null, $post_id, $element_type);
    $current_lang = apply_filters('wpml_current_language', null);

    if (!$trid) {
        $fallback_code = $current_lang ? $current_lang : 'en';
        return array(
            $fallback_code => array(
                'code' => $fallback_code,
                'url' => get_permalink($post_id),
                'translated_id' => $post_id,
                'active' => 1,
            ),
        );
    }

    $wpml_translations = apply_filters('wpml_get_element_translations', null, $trid, $element_type);
    if (empty($wpml_translations) || !is_array($wpml_translations)) {
        $fallback_code = $current_lang ? $current_lang : 'en';
        return array(
            $fallback_code => array(
                'code' => $fallback_code,
                'url' => get_permalink($post_id),
                'translated_id' => $post_id,
                'active' => 1,
            ),
        );
    }

    $translations = array();
    foreach ($wpml_translations as $lang_code => $translation) {
        if (empty($translation->element_id) || $translation->post_status !== 'publish') {
            continue;
        }

        $translated_id = (int) $translation->element_id;
        $raw_url = get_permalink($translated_id);
        $translations[$lang_code] = array(
            'code' => $lang_code,
            'url' => apply_filters('wpml_permalink', $raw_url, $lang_code),
            'translated_id' => $translated_id,
            'active' => $current_lang === $lang_code ? 1 : 0,
        );
    }

    return $translations;
}

// Allow ACF post pickers to list posts from all WPML languages.
function polyblog_acf_all_languages_query($args, $field, $post_id) {
    // Bypass WPML language filtering so ACF pickers include every language.
    $args['suppress_filters'] = true;

    // Keep broad post visibility for selectors.
    if (empty($args['post_status'])) {
        $args['post_status'] = array('publish');
    }

    // Remove language-specific arguments if they were injected upstream.
    if (isset($args['lang'])) {
        unset($args['lang']);
    }

    return $args;
}

// Global filters: apply to every Post Object / Relationship field, regardless of field name.
add_filter('acf/fields/post_object/query', 'polyblog_acf_all_languages_query', 20, 3);
add_filter('acf/fields/relationship/query', 'polyblog_acf_all_languages_query', 20, 3);

// Keep optional name-specific hooks for compatibility with existing field names.
add_filter('acf/fields/post_object/query/name=article', 'polyblog_acf_all_languages_query', 20, 3);
add_filter('acf/fields/post_object/query/name=articles', 'polyblog_acf_all_languages_query', 20, 3);
add_filter('acf/fields/relationship/query/name=article', 'polyblog_acf_all_languages_query', 20, 3);
add_filter('acf/fields/relationship/query/name=articles', 'polyblog_acf_all_languages_query', 20, 3);

// Return all published WPML translation post IDs for a given post.
function polyblog_get_wpml_post_ids($post_id) {
    $post_id = (int) $post_id;
    if (!$post_id) {
        return array();
    }

    $trid = apply_filters('wpml_element_trid', null, $post_id, 'post_post');
    if (!$trid) {
        return array($post_id);
    }

    $translations = apply_filters('wpml_get_element_translations', null, $trid, 'post_post');
    if (empty($translations) || !is_array($translations)) {
        return array($post_id);
    }

    $ids = array();
    foreach ($translations as $translation) {
        if (!empty($translation->element_id) && $translation->post_status === 'publish') {
            $ids[] = (int) $translation->element_id;
        }
    }

    $ids = array_values(array_unique($ids));
    return !empty($ids) ? $ids : array($post_id);
}

// Use one consistent browser title across the site.
function polyblog_document_title() {
    return 'Polyblog Lebanon';
}
add_filter( 'pre_get_document_title', 'polyblog_document_title' );

function polyblog_site_name() {
    return 'Polyblog Lebanon';
}
add_filter( 'pre_option_blogname', 'polyblog_site_name' );

function polyblog_bloginfo_name( $output, $show ) {
    // $lang = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'ar';
    $lang = 'en';
    if ( $show === 'name' ) {
        return ( $lang === 'en' ) ? 'Polyblog Lebanon' : 'بوليبلوغ لبنان';
    }
    if ( $show === 'description' ) {
        return ( $lang === 'en' ) ? 'Politics, not news' : 'سياسة مش أخبار';
    }
    return $output;
}
add_filter( 'bloginfo', 'polyblog_bloginfo_name', 10, 2 );

// Suppress WPML's SQL-level language filter on category archives;
// templates build their own cross-language WP_Query.
// add_action('pre_get_posts', function($query) {
//     if (!is_admin() && $query->is_main_query() && $query->is_category()) {
//         $query->set('suppress_filters', true);
//     }
// }, 99);

// add_action('pre_get_posts', function ($query) {

//     if (is_admin() || !$query->is_main_query() || !is_category()) {
//         return;
//     }

//     $category = get_queried_object();

//     $category_ids = array($category->term_id);

//     $translated = apply_filters(
//         'wpml_object_id',
//         $category->term_id,
//         'category',
//         false,
//         'en'
//     );

//     if ($translated && $translated != $category->term_id) {
//         $category_ids[] = $translated;
//     }

//     $query->set('category__in', $category_ids);

//     // Disable WPML language filtering
//     $query->set('suppress_filters', true);

// });

// ─── SMTP configuration via PHPMailer ──────────────────────────────────────
if ( file_exists( get_template_directory() . '/inc/smtp-config.php' ) ) {
    require_once get_template_directory() . '/inc/smtp-config.php';
}

if ( defined( 'POLYBLOG_SMTP_HOST' ) ) {
    add_action( 'phpmailer_init', function ( $phpmailer ) {
        $phpmailer->isSMTP();
        $phpmailer->Host       = POLYBLOG_SMTP_HOST;
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Port       = POLYBLOG_SMTP_PORT;
        $phpmailer->SMTPSecure = POLYBLOG_SMTP_SECURE;
        $phpmailer->Username   = POLYBLOG_SMTP_USER;
        $phpmailer->Password   = POLYBLOG_SMTP_PASS;
        $phpmailer->From       = POLYBLOG_SMTP_FROM;
        $phpmailer->FromName   = POLYBLOG_SMTP_NAME;
        $phpmailer->CharSet    = 'UTF-8';
        // Log the full SMTP conversation to the PHP error log for debugging.
        $phpmailer->SMTPDebug  = 2;
        $phpmailer->Debugoutput = static function ( string $str, int $level ) {
            error_log( 'SMTP (' . $level . '): ' . trim( $str ) );
        };
    } );
}

// ─── Contact Form AJAX Handler ──────────────────────────────────────────────
add_action( 'wp_ajax_polyblog_contact',        'polyblog_handle_contact_form' );
add_action( 'wp_ajax_nopriv_polyblog_contact', 'polyblog_handle_contact_form' );

function polyblog_handle_contact_form(): void {
    if ( ! check_ajax_referer( 'polyblog_contact_nonce', 'pb_nonce', false ) ) {
        wp_send_json_error( [ 'message' => 'Security check failed.' ], 403 );
    }

    $name      = sanitize_text_field( wp_unslash( $_POST['pb_name']      ?? '' ) );
    $email     = sanitize_email(      wp_unslash( $_POST['pb_email']     ?? '' ) );
    $country   = sanitize_text_field( wp_unslash( $_POST['pb_country']   ?? '' ) );
    $phone     = sanitize_text_field( wp_unslash( $_POST['pb_phone']     ?? '' ) );
    $social    = sanitize_text_field( wp_unslash( $_POST['pb_social']    ?? '' ) );
    $interests = sanitize_text_field( wp_unslash( $_POST['pb_interests'] ?? '' ) );
    $writings  = sanitize_text_field( wp_unslash( $_POST['pb_writings']  ?? '' ) );
    $languages = sanitize_text_field( wp_unslash( $_POST['pb_languages'] ?? '' ) );
    $pitch     = sanitize_textarea_field( wp_unslash( $_POST['pb_pitch'] ?? '' ) );
    // Mobile-only social fields
    $instagram = sanitize_text_field( wp_unslash( $_POST['pb_instagram'] ?? '' ) );
    $facebook  = sanitize_text_field( wp_unslash( $_POST['pb_facebook']  ?? '' ) );
    $twitter   = sanitize_text_field( wp_unslash( $_POST['pb_twitter']   ?? '' ) );
    $youtube   = sanitize_text_field( wp_unslash( $_POST['pb_youtube']   ?? '' ) );

    if ( empty( $social ) ) {
        $parts  = array_filter( [
            $instagram ? 'Instagram: ' . $instagram : '',
            $facebook  ? 'Facebook: '  . $facebook  : '',
            $twitter   ? 'Twitter: '   . $twitter   : '',
            $youtube   ? 'YouTube: '   . $youtube   : '',
        ] );
        $social = implode( ', ', $parts );
    }

    $errors = [];
    if ( empty( $name ) )                          $errors['pb_name']      = 'Name is required.';
    if ( empty( $email ) || ! is_email( $email ) ) $errors['pb_email']     = 'A valid email address is required.';
    if ( empty( $phone ) )                         $errors['pb_phone']     = 'Phone number is required.';
    if ( empty( $interests ) )                     $errors['pb_interests'] = 'Areas of interest are required.';
    if ( empty( $pitch ) )                         $errors['pb_pitch']     = 'Please write your pitch.';

    if ( ! empty( $errors ) ) {
        wp_send_json_error( [ 'errors' => $errors ], 422 );
    }

    $admin_to  = defined( 'POLYBLOG_SMTP_FROM' ) ? POLYBLOG_SMTP_FROM : get_option( 'admin_email' );
    $site_name = defined( 'POLYBLOG_SMTP_NAME' ) ? POLYBLOG_SMTP_NAME : get_bloginfo( 'name' );
    $data      = compact( 'name', 'email', 'country', 'phone', 'social', 'interests', 'writings', 'languages', 'pitch' );

    wp_mail(
        $admin_to,
        'New Contributor Submission: ' . $name,
        polyblog_contact_admin_email( $data ),
        [ 'Content-Type: text/html; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>' ]
    );

    wp_mail(
        $email,
        'Thank you for reaching out to ' . $site_name . '!',
        polyblog_contact_thankyou_email( $name, $site_name ),
        [ 'Content-Type: text/html; charset=UTF-8', 'From: ' . $site_name . ' <' . $admin_to . '>' ]
    );

    wp_send_json_success( [ 'message' => 'Your message has been sent! We will get back to you soon.' ] );
}

function polyblog_contact_admin_email( array $d ): string {
    $phone_full = trim( esc_html( $d['country'] ) . ' ' . esc_html( $d['phone'] ) );
    return '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><style>
body{font-family:Arial,sans-serif;background:#f5f5f5;margin:0;padding:20px}
.wrap{max-width:600px;margin:0 auto;background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.12)}
.hdr{background:#111;padding:28px 30px;text-align:center}
.hdr h1{color:#fff;margin:0;font-size:20px;letter-spacing:.5px}
.hdr span{color:#c9a84c}
.body{padding:28px 30px}
.field{margin-bottom:14px;padding-bottom:14px;border-bottom:1px solid #eee}
.field label{display:block;font-weight:700;color:#666;font-size:11px;text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px}
.field p{margin:0;color:#111;font-size:15px}
.pitch{background:#f8f8f8;border-left:3px solid #c9a84c;padding:14px 16px;white-space:pre-wrap;font-size:14px;line-height:1.6;color:#333}
.ftr{background:#111;padding:14px;text-align:center;color:#666;font-size:11px}
</style></head><body><div class="wrap">
<div class="hdr"><h1>New Submission &mdash; <span>PolyBlog</span></h1></div>
<div class="body">
<div class="field"><label>Name</label><p>' . esc_html( $d['name'] ) . '</p></div>
<div class="field"><label>Email</label><p>' . esc_html( $d['email'] ) . '</p></div>
<div class="field"><label>Phone</label><p>' . $phone_full . '</p></div>
<div class="field"><label>Social Media</label><p>' . ( $d['social'] ? esc_html( $d['social'] ) : '&mdash;' ) . '</p></div>
<div class="field"><label>Areas of Interest</label><p>' . esc_html( $d['interests'] ) . '</p></div>
<div class="field"><label>Previous Writings</label><p>' . ( $d['writings'] ? esc_html( $d['writings'] ) : '&mdash;' ) . '</p></div>
<div class="field"><label>Languages</label><p>' . ( $d['languages'] ? esc_html( $d['languages'] ) : '&mdash;' ) . '</p></div>
<div class="field" style="border-bottom:none"><label>Pitch</label><div class="pitch">' . esc_html( $d['pitch'] ) . '</div></div>
</div>
<div class="ftr">PolyBlog &mdash; Contributor Submission</div>
</div></body></html>';
}

function polyblog_contact_thankyou_email( string $name, string $site_name ): string {
    $year = gmdate( 'Y' );
    return '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><style>
body{font-family:Arial,sans-serif;background:#f5f5f5;margin:0;padding:20px}
.wrap{max-width:600px;margin:0 auto;background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.12)}
.hdr{background:#111;padding:44px 30px;text-align:center}
.hdr h1{color:#fff;margin:0 0 8px;font-size:28px}
.hdr p{color:#c9a84c;margin:0;font-size:13px;letter-spacing:.5px}
.body{padding:36px 30px;color:#333;font-size:15px;line-height:1.7}
.body h2{color:#111;margin-top:0;font-size:18px}
.cta{display:inline-block;margin:20px 0 10px;padding:12px 30px;background:#111;color:#fff;text-decoration:none;border-radius:4px;font-size:14px}
.ftr{background:#f0f0f0;padding:16px;text-align:center;color:#aaa;font-size:11px}
</style></head><body><div class="wrap">
<div class="hdr"><h1>Thank You!</h1><p>We&rsquo;ve received your submission</p></div>
<div class="body">
<h2>Hi ' . esc_html( $name ) . ',</h2>
<p>Thank you for reaching out to <strong>' . esc_html( $site_name ) . '</strong>! We&rsquo;ve received your submission and our team will review it carefully.</p>
<p>We&rsquo;ll get back to you as soon as possible. In the meantime, feel free to explore our latest content.</p>
<a href="https://polybloglb.com" class="cta">Visit PolyBlog</a>
<p style="margin-top:24px">Warm regards,<br><strong>The PolyBlog Team</strong></p>
</div>
<div class="ftr">&copy; ' . $year . ' PolyBlog. All rights reserved.</div>
</div></body></html>';
}