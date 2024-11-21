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

    wp_enqueue_style( 'polyblog-custom_style', get_template_directory_uri() . '/inc/assets/css/custom_style.css', array(), '1.39' );
    wp_enqueue_style( 'polyblog-responsive_style', get_template_directory_uri() . '/inc/assets/css/responsive.css', array(), '1.39' );

	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
	wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );

    // ========================================================================
    // Add all custom js libraries here
    wp_enqueue_script('polyblog-swiper-js', get_template_directory_uri() . '/inc/assets/js/swiper.min.js', array(), '1', true );

    // jquery visibale
    wp_enqueue_script('queryvisible-js', get_template_directory_uri() . '/inc/assets/js/jquery.visible.js', array(), '1', true );

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
        acf_register_block_type(
            array(
                'name'              => 'Block1',
                'title'             => __('Block1'),
                'description'       => __('This is the first Block of Homepage'),
                'render_template'   => 'blocks/block_1.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
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
                'name'              => 'Three Posts block',
                'title'             => __('Three Posts block'),
                'description'       => __('This is the Three Posts block of Homepage'),
                'render_template'   => 'blocks/three_posts_block.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Special Productions Block',
                'title'             => __('Special Productions Block'),
                'description'       => __('This is the Special Productions Block of Homepage'),
                'render_template'   => 'blocks/special_productions_block.php',
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
	}
}

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

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $author_name = get_the_title($author_id);
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
