<?php
/**
 * oregonaglink functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oregonaglink
 */
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
	
	$theme_version = $theme->get( 'Version' );
	
	$css_version = $theme_version . '.' . filemtime( get_template_directory() . 'style.css' );
	
	wp_deregister_script( 'jquery' );
	
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, null );
	
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'oregonaglink-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '20151215', true );
	
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );

	wp_enqueue_style( 'oregonaglink-style', get_stylesheet_uri(), '', $css_version );
	
	wp_enqueue_style( 'oregonaglink-font-1', 'https://fonts.googleapis.com/css?family=Montserrat:400,600' );
	
	wp_enqueue_style( 'oregonaglink-font-2', 'https://fonts.googleapis.com/css?family=Arvo:400,700' );
	
}

add_action( 'wp_enqueue_scripts', 'oregonaglink_scripts' );

/**
 * Image sizes
 */
add_theme_support( 'post-thumbnails' );
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

/*
 * Add custom admin styles
 */
add_action('wp_head', 'admin_bar_style_override');
add_action('admin_head', 'admin_bar_style_override');

function admin_bar_style_override() {
	
	if ( is_user_logged_in() ) {
		
		?>
		
		<style>
		
			#wp-link .link-button { 
				padding: 3px 0 0; 
				white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
			}
			#wp-link .link-button label {
				max-width: 70%;
				padding-left: 4px;
			}
			.has-text-field #wp-link .query-results {
				top: 230px;
			}
			.yoast-notification, #edittag h2, .term-description-wrap, .term-parent-wrap, .term-name-wrap .description, .term-slug-wrap .description, .post-attributes-help-text, .menu-order-label-wrapper, #menu_order, #directory-categorydiv, .ac-message, #ac-pro-version, #direct-feedback, .installer-plugin-update-tr, .plugins .dashicons, .shortpixel-notice, #emr-news, .wrap.emr_upload_form .option-flex-wrapper, .emr_upload_form #message, .user-syntax-highlighting-wrap {
				display: none !important;
			}
			#tribe-events-status, #tribe_events_event_options, form#your-profile > h3, form#your-profile .user-profile-picture, form#your-profile .user-description-wrap, form#your-profile .user-display-name-wrap, form#your-profile .user-nickname-wrap, form#your-profile .show-admin-bar, .user-comment-shortcuts-wrap, form#your-profile .yoast-settings, form#your-profile .user-rich-editing-wrap, form#your-profile .user-admin-color-wrap, form#your-profile .user-url-wrap, form#your-profile .user-facebook-wrap, form#your-profile .user-instagram-wrap, form#your-profile .user-linkedin-wrap, form#your-profile .user-myspace-wrap, form#your-profile .user-pinterest-wrap, form#your-profile .user-soundcloud-wrap, form#your-profile .user-tumblr-wrap, form#your-profile .user-twitter-wrap, form#your-profile .user-youtube-wrap, form#your-profile .user-wikipedia-wrap  {
				display: none;
			}
			#your-profile h2 {
				display: none;
			}
			#edittag {
				max-width: 90% !important;
			}
			.acf-actions {
				text-align: left;
			}
			.media-modal #wpmf-breadcrumb { position: relative; }
			.acf-escaped-html-notice {
				display: none;
			}
			
	<?php
		
	}
	
	echo "</style>";
	
}

/**
 * Removes tags from blog posts
 */
add_action( 'init', 'unregister_tags' );

function unregister_tags() {
	
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
    
}

/**
 * Change excerpt styling
 */
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_more( $more ) {
	
	return '... <a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a>';
	
}

/**
 * Plugin: Tribe Events Calendar
 */
function is_tribe_calendar() { // detect if we're on an Events Calendar page
	if (tribe_is_month() || tribe_is_upcoming() || tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' ))
		return true;
	else return false;
}

add_filter( 'acf/the_field/allow_unsafe_html', function( $allowed, $selector ) {
    
    return true;
    
    return $allowed;
    
}, 10, 2);
