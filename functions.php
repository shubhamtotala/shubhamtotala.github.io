<?php
/**
 * SKT Spiritedlite functions and definitions
 *
 * @package SKT Spiritedlite
 */

// Set the word limit of post content 
function spiritedlite_content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(' ',$content).'...';
} else {
$content = implode(' ',$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'spiritedlite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function spiritedlite_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'spirited-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	register_nav_menu( 'primary', esc_attr__( 'Primary Menu', 'spirited-lite' ) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	
	add_editor_style( 'editor-style.css' );
}
endif; // spiritedlite_setup
add_action( 'after_setup_theme', 'spiritedlite_setup' );


function spiritedlite_widgets_init() {	
	
	register_sidebar( array(
		'name'          => esc_attr__( 'Blog Sidebar', 'spirited-lite' ),
		'description'   => esc_attr__( 'Appears on blog page sidebar', 'spirited-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
}
add_action( 'widgets_init', 'spiritedlite_widgets_init' );


function spiritedlite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','Roboto:on or off','spirited-lite');
		$robotocondensed = _x('on','Roboto Condensed:on or off','spirited-lite');
		$opensans = _x('on','Open Sans:on or off','spirited-lite');
		$lato = _x('on','Lato:on or off','spirited-lite');
		$montserrat = _x('on','Montserrat:on or off','spirited-lite');
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/		
		
		if('off' !== $roboto || 'off' !== $robotocondensed || 'off' !== $opensans || 'off' !== $lato || 'off' !== $montserrat ){
			$font_family = array();
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}
			
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:400,300,700,300italic,400italic,700italic';
			}			
			
			if('off' !== $opensans){
				$font_family[] = 'Open Sans:400,300,300italic,600,400italic,600italic,700,800,700italic,800italic';
			}	
			
			if('off' !== $lato){
				$font_family[] = 'Lato:400,400italic,700,700italic,900,900italic';
			}
			
			if('off' !== $montserrat){
				$font_family[] = 'Montserrat:400,700';
			}									
				
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function spiritedlite_scripts() {
	wp_enqueue_style('spiritedlite-font', spiritedlite_font_url(), array());
	wp_enqueue_style( 'spiritedlite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'spiritedlite-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'spiritedlite-nivoslider-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_style( 'spiritedlite-main-style', get_template_directory_uri().'/css/responsive.css' );		
	wp_enqueue_style( 'spiritedlite-base-style', get_template_directory_uri().'/css/style_base.css' );
	wp_enqueue_script( 'spiritedlite-nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'spiritedlite-custom_js', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_style( 'spiritedlite-font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );
	wp_enqueue_style( 'spiritedlite-animation-style', get_template_directory_uri().'/css/animation.css' );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spiritedlite_scripts' );

function spiritedlite_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('spiritedlite-ie', get_template_directory_uri().'/css/ie.css', array('spiritedlite-style'));
	$wp_styles->add_data('spiritedlite-ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','spiritedlite_ie_stylesheet');


function spiritedlite_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. esc_attr( $paged ) . ' of ' . esc_attr( $wp_query->max_num_pages ) .'</span></li>';
		foreach ( $page_format as $page ) {
			echo '<li>' . wp_kses_post($page) . '</li>';
		}
		echo '</ul></div></div>';
	}
}


define('SKT_URL','http://www.sktthemes.net');
define('SKT_THEME_URL','http://www.sktthemes.net/themes');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/spirited-doc/');
define('SKT_PRO_THEME_URL','http://www.sktthemes.net/shop/spirited-corporate-wordpress-theme');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// get slug by id
function spiritedlite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}