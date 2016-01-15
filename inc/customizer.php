<?php
/**
 * SKT Spiritedlite Theme Customizer
 *
 * @package SKT Spiritedlite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function spiritedlite_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class spiritedlite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => __('Logo (PRO Version)', 'spirited-lite'),
            'priority' => 1,
 			'description' => sprintf( __( 'Logo Settings available in<br /> %s.', 'spirited-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'spirited-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('spiritedlite_options[logo-info]',array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new spiritedlite_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'spiritedlite_options[logo-info]',
        'priority' => null
        ) )
    );
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#7c7c7c',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','spirited-lite'),
 			'description' => sprintf( __( 'More color options in <br /> %s.', 'spirited-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'spirited-lite' )
						)
					),				
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

// Home Boxes 	
	$wp_customize->add_section('page_boxes',array(
		'title'	=> __('Home Featured Boxes','spirited-lite'),
		'description'	=> __('Select Pages from the dropdown','spirited-lite'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',array(
			'sanitize_callback'	=> 'spiritedlite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box one:','spirited-lite'),
			'section'	=> 'page_boxes'	
	));
	
	$wp_customize->add_setting('page-setting2',array(
			'sanitize_callback'	=> 'spiritedlite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box two:','spirited-lite'),
			'section'	=> 'page_boxes'
	));
	
	$wp_customize->add_setting('page-setting3',array(
			'sanitize_callback'	=> 'spiritedlite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box three:','spirited-lite'),
			'section'	=> 'page_boxes'
	));	
	 
// Home Boxes

// Home What We Do Section
	$wp_customize->add_section('wedo_box',array(
		'title'	=> __('Home What We Do Section','spirited-lite'),
		'description'	=> __('Select Page from the dropdown','spirited-lite'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('wedopage-setting',array(
			'sanitize_callback'	=> 'spiritedlite_sanitize_integer'
	));
	
	$wp_customize->add_control('wedopage-setting',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for what we do section','spirited-lite'),
			'section'	=> 'wedo_box'	
	));
// Home What We Do Section


// Home What We Do Three Box 	
	$wp_customize->add_section('three_boxes',array(
		'title'	=> __('Home What We Do Three Box','spirited-lite'),
		'description'	=> __('Select Pages from the dropdown','spirited-lite'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('box-setting1',array(
			'sanitize_callback'	=> 'spiritedlite_sanitize_integer'
	));
	
	$wp_customize->add_control('box-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box one:','spirited-lite'),
			'section'	=> 'three_boxes'	
	));
	
	$wp_customize->add_setting('box-setting2',array(
			'sanitize_callback'	=> 'spiritedlite_sanitize_integer'
	));
	
	$wp_customize->add_control('box-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box two:','spirited-lite'),
			'section'	=> 'three_boxes'
	));
	
	$wp_customize->add_setting('box-setting3',array(
			'sanitize_callback'	=> 'spiritedlite_sanitize_integer'
	));
	
	$wp_customize->add_control('box-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box three:','spirited-lite'),
			'section'	=> 'three_boxes'
	));	
	 
// Home What We Do Three Box
 
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','spirited-lite'),
 			'description' => sprintf( __( 'Add slider images here. <br /> More slider settings available in <br /> %s.', 'spirited-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'spirited-lite' )
						)
					),			
		'priority'		=> null
	));	
	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider1.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(   new WP_Customize_Image_Control( $wp_customize, 'slide_image1', array(
            'label' => __('Slide Image 1 (1400x544)','spirited-lite'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
       		)
     	 )
	);	
	$wp_customize->add_setting('slide_title1',array(
			'default'	=> __('Welcome To Our Website','spirited-lite'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title1', array(	
			'label'	=> __('Slide title 1','spirited-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title1'
	));
	$wp_customize->add_setting('slide_desc1',array(
		'default'	=> __('Quisque blandit dolor risus, sed dapibus dui facilisis sed. Donec eu porta elit. Aliquam porta sollicitudin ante, acntum orci mattis et. Phasellus ac nibh eleifend, sagittis purus nec, elementum massa. Quisque tincidunt sapien a sem porttitor, id convallis dolor','spirited-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc1', array(
				'label'	=> __('Slider description  1','spirited-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc1'
			)
		)
	);
	$wp_customize->add_setting('slide_link1',array(
			'default'	=> '#link1',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link1',array(
			'label'	=> __('Slide link 1','spirited-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link1'
	));	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider2.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'slide_image2', array(
				'label'	=> __('Slide image 2','spirited-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image2'
			)
		)
	);	
	$wp_customize->add_setting('slide_title2',array(
			'default'	=> __('Build Your Imagination','spirited-lite'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title2', array(	
			'label'	=> __('Slide title 2','spirited-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title2'
	));	
	$wp_customize->add_setting('slide_desc2',array(
			'default'	=> __('Quisque blandit dolor risus, sed dapibus dui facilisis sed. Donec eu porta elit. Aliquam porta sollicitudin ante, acntum orci mattis et. Phasellus ac nibh eleifend, sagittis purus nec, elementum massa. Quisque tincidunt sapien a sem porttitor, id convallis dolor','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc2', array(
				'label'	=> __('Slide description 2','spirited-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc2'
			)
		)
	);	
	$wp_customize->add_setting('slide_link2',array(
			'default'	=> '#link2',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('slide_link2',array(
		'label'	=> __('Slide link 2','spirited-lite'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_link2'
	));	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider3.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control(	$wp_customize,'slide_image3', array(
				'label'	=> __('Slide Image 3','spirited-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image3'				
			)
		)
	);	
	$wp_customize->add_setting('slide_title3',array(
			'default'	=> __('Striving To Excellence','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('slide_title3', array(		
			'label'	=> __('Slide title 3','spirited-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title3'			
	));	
	$wp_customize->add_setting('slide_desc3',array(
			'default'	=> __('Quisque blandit dolor risus, sed dapibus dui facilisis sed. Donec eu porta elit. Aliquam porta sollicitudin ante, acntum orci mattis et. Phasellus ac nibh eleifend, sagittis purus nec, elementum massa. Quisque tincidunt sapien a sem porttitor, id convallis dolor','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control($wp_customize,'slide_desc3', array(
				'label'	=> __('Slide Description 3','spirited-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc3'		
			)
		)
	);	
	$wp_customize->add_setting('slide_link3',array(
			'default'	=> '#link3',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link3',array(
			'label'	=> __('Slide link 3','spirited-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link3'
	));	
 
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','spirited-lite'),
 			'description' => sprintf( __( 'Add social icons link here.<br />More icon available in %s.', 'spirited-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'spirited-lite' )
						)
					),			
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','spirited-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','spirited-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','spirited-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','spirited-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	$wp_customize->add_section('footer_text',array(
			'title'	=> __('Footer Area','spirited-lite'),
			'priority'	=> null,
			'description'	=> __('Add footer copyright text','spirited-lite')
	));
	$wp_customize->add_setting('spiritedlite_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new spiritedlite_Info( $wp_customize, 'cred_section', array(
		'label'	=> __('To modify footer copyright notice without changing your themes code, please upgrade to pro.','spirited-lite'),
        'section' => 'footer_text',
        'settings' => 'spiritedlite_options[credit-info]'
        ) )
    );
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('About Spirited','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add about title here','spirited-lite'),
			'section'	=> 'footer_text',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description', array(
			'default'	=> __('Sed suscipit mauris nec mauris vulputate, a posuere libero congue. Nam laoreet elit eu erat pulvinar, et efficitur nibh euismod.Nam metus lorem, hendrerit quis ante eget, lobortis elementum neque. Aliquam in ullamcorper quam. Integer euismod ligula in mauris vehic.','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'about_description', array(
				'label'	=> __('Add about description for footer','spirited-lite'),
				'section'	=> 'footer_text',
				'setting'	=> 'about_description'
			)
		)
	);
	
	$wp_customize->add_setting('recent_title',array(
			'default'	=> __('Recent Posts','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('recent_title',array(
			'label'	=> __('Add recent post title here','spirited-lite'),
			'section'	=> 'footer_text',
			'setting'	=> 'recent_title'
	));
	
	
	$wp_customize->add_setting('social_title',array(
			'default'	=> __('Get Some Social','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('social_title',array(
			'label'	=> __('Add footer social title here','spirited-lite'),
			'section'	=> 'footer_text',
			'setting'	=> 'social_title'
	));
	
	
	
	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Details','spirited-lite'),
			'description'	=> __('Add you contact details here','spirited-lite'),
			'priority'	=> null
	));
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('Spirited 532, Premium Plaza, New York, NY 1203','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> __('Add contact address here','spirited-lite'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+123 456 7890','spirited-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','spirited-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','spirited-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));
	
	$wp_customize->add_section(
        'theme_layout_sec',
        array(
            'title' => __('Layout Settings (PRO Version)', 'spirited-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'Layout Settings available in <br />%s.', 'spirited-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'spirited-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('spiritedlite_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new spiritedlite_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'spiritedlite_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section(
        'theme_font_sec',
        array(
            'title' => __('Fonts Settings (PRO Version)', 'spirited-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'Font Settings available in <br />%s.', 'spirited-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'spirited-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('spiritedlite_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new spiritedlite_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'spiritedlite_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section(
        'theme_doc_sec',
        array(
            'title' => __('Documentation &amp; Support', 'spirited-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'For documentation and support check this link : <br />%s.', 'spirited-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_DOC.'"' ), __( 'Spirited Documentation', 'spirited-lite' )
						)
					),							
        )
    );  
    $wp_customize->add_setting('spiritedlite_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new spiritedlite_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'spiritedlite_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'spiritedlite_customize_register' );

//Integer
function spiritedlite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function spiritedlite_custom_css(){
		?>
        	<style type="text/css">
					
					a, .header .header-inner .nav ul li a:hover, 
					.signin_wrap a:hover,				
					.services-wrap .one_fourth:hover h3,
					.blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,
					.MoreLink:hover,
					.cols-3 ul li a:hover,.wedobox:hover .btn-small,.wedobox:hover .boxtitle,.slide_more
					{ color:<?php echo esc_attr(get_theme_mod('color_scheme','#7c7c7c') ); ?>;}
					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#7c7c7c')); ?>;}
					
					.MoreLink:hover
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#7c7c7c')); ?>;}
					
			</style>
<?php      
}
         
add_action('wp_head','spiritedlite_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function spiritedlite_customize_preview_js() {
	wp_enqueue_script( 'spiritedlite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'spiritedlite_customize_preview_js' );


function spiritedlite_custom_customize_enqueue() {
	wp_enqueue_script( 'Spiritedlite-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'spiritedlite_custom_customize_enqueue' );