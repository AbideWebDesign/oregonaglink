<?php
/**
 * oregonaglink functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oregonaglink
 */
require WP_CONTENT_DIR . '/plugins/plugin-update-checker-master/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/AbideWebDesign/oregonaglink',
	__FILE__,
	'oregonaglink'
);
if ( ! function_exists( 'oregonaglink_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oregonaglink_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on oregonaglink, use a find and replace
		 * to change 'oregonaglink' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'oregonaglink', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'oregonaglink' ),
			'menu-2' => esc_html__( 'Header Top', 'oregonaglink' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	}
endif;
add_action( 'after_setup_theme', 'oregonaglink_setup' );

/**
 * Enqueue scripts and styles.
 */
function oregonaglink_scripts() {
	$theme = wp_get_theme();
	
	wp_deregister_script( 'jquery' );
	
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, null );
	
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'oregonaglink-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '20151215', true );
	
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );

	wp_enqueue_style( 'oregonaglink-style', get_stylesheet_uri(), '', $theme->version );
	
	wp_enqueue_style( 'oregonaglink-font-1', 'https://fonts.googleapis.com/css?family=Montserrat:400,600' );
	
	wp_enqueue_style( 'oregonaglink-font-2', 'https://fonts.googleapis.com/css?family=Arvo:400,700' );
}
add_action( 'wp_enqueue_scripts', 'oregonaglink_scripts' );

/**
 * Image sizes
 */
set_post_thumbnail_size(360, 270, true);
add_image_size('col-3', 295);
add_image_size('col-4', 434);
add_image_size('col-5', 542);
add_image_size('col-6', 650);
add_image_size('col-7', 759);
add_image_size('profile', 300, 300, true);
add_image_size('lead box', 635, 400, true);
add_image_size('lead box square', 433, 433, true);
add_image_size('hero banner', 2400, 1600, true);
add_image_size('cta banner', 1600, 400, true);
add_image_size('content block', 530, 640, true);
add_image_size('default-3', 295, 195, true);

/**
 * Function: Add custom image sizes to media library
 */ 
function post_image_sizes($sizes){
    return array_merge( $sizes, array(
		'profile' => __( 'Profile Image' ),
    ) );
}
add_filter('image_size_names_choose', 'post_image_sizes');

/**
 * Function: Return List of Children or Sibling Page IDs
 */
function get_page_links($page_id) {

	if ($parent = wp_get_post_parent_id($page_id)) {
		
		$page_ids = get_pages(array('child_of' => $parent, 'parent' => $parent, 'sort_column' => 'menu_order', 'depth' => 1));
		
	} else {
		
		$page_ids = get_pages(array('child_of' => $page_id, 'parent' => $page_id, 'sort_column' => 'menu_order', 'depth' => 1));
		
	}

	return $page_ids;
} 

/**
 * Plugin: ACF Options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Call to Action Blocks',
		'menu_title'	=> 'Call to Action Blocks',
		'parent_slug'	=> 'theme-general-settings',
	));
}

function acf_load_cta_choices( $field ) {
    // reset choices
    $field['choices'] = array();
    // if has rows
    if( have_rows('call_to_action_blocks', 'option') ) {        
        // while has rows
        while( have_rows('call_to_action_blocks', 'option') ) {
            // instantiate row
            the_row();
            
            // vars
            $value = get_sub_field('cta_title');
            $label = get_sub_field('cta_title');

            // append to choices
            $field['choices'][ $value ] = $label;
        }
    }
    // return the field
    return $field;
} 
add_filter('acf/load_field/name=page_cta_block', 'acf_load_cta_choices');


/**
 * Add Bootstrap 4 Nav walker
 */
require_once("bs4Navwalker.php");

/**
 * Add Bootstrap 4 inline list classes
 */
function bootstrap_inline_list_class($classes, $item, $args) {
    if( $args->add_li_class ) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'bootstrap_inline_list_class', 1, 3);

/**
 * Create search results title
 */
function search_results_title() {
	if( is_search() ) {
	
		global $wp_query;
		
		if( $wp_query->post_count == 1 ) {
			$result_title .= '1 search result found';
		} else {
			$result_title .= $wp_query->found_posts . ' search results found';
		}
		
		$result_title .= " for “" . wp_specialchars($wp_query->query_vars['s'], 1) . "”";
		
		echo $result_title;
	
	}
}

/*
 * Custom pagination function
 */
function show_pagination_links() {
    global $wp_query;

    $page_tot   = $wp_query->max_num_pages;
    $page_cur   = get_query_var( 'paged' );
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $page_cur ),
            'total'     => $page_tot,
            'prev_next' => true,
			'prev_text'    => __('&lsaquo; Previous', 'progression'),
			'next_text'    => __('Next &rsaquo;', 'progression'),
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}

/**
 * Plugin: Gravity Form
 */
function spinner_url($image_src, $form) {
    return "";
}
add_filter("gform_ajax_spinner_url_1", "spinner_url", 10, 2);

/**
 * Plugin: Tribe Events Calendar
 */
function is_tribe_calendar() { // detect if we're on an Events Calendar page
	if (tribe_is_month() || tribe_is_upcoming() || tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' ))
		return true;
	else return false;
}