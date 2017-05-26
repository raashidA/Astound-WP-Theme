<?php
/**
 * Options.
 *
 * @package Astound
 */

$default = Astound_get_default_theme_options();

//Color Setting Starts
// Add Color Options Panel.
$wp_customize->add_panel( 'color_option_panel',
	array(
		'title'      => esc_html__( 'Advance Color Options', 'Astound' ),
		'priority'   => 90,
	)
);

// Primary Color Section.
$wp_customize->add_section( 'section_primary_color',
	array(
		'title'      => esc_html__( 'General Colors', 'Astound' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);
//Body color options
$wp_customize->add_setting('body_color', array(
	'default' 			=> $default['body_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'body_color',
		array(
			'label'       => esc_html__( 'Body Text Color', 'Astound' ),
			'settings'    => 'body_color',
			'section'     => 'section_primary_color',	
			'priority' => 100,			   
		)
	)
);

//Site title color options
$wp_customize->add_setting('site_title_color', array(
	'default' 			=> $default['site_title_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'site_title_color',
		array(
			'label'       => esc_html__( 'Site Title Color', 'Astound' ),
			'settings'    => 'site_title_color',
			'section'     => 'section_primary_color',	
			'priority' => 100,			   
		)
	)
);

//Site description color options
$wp_customize->add_setting('site_description_color', array(
	'default' 			=> $default['site_description_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'site_description_color',
		array(
			'label'       => esc_html__( 'Site Description Color', 'Astound' ),
			'settings'    => 'site_description_color',
			'section'     => 'section_primary_color',	
			'priority' => 100,			   
		)
	)
);

//Button color options
$wp_customize->add_setting('button_color', array(
	'default' 			=> $default['button_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'button_color',
		array(
			'label'       => esc_html__( 'Button Color', 'Astound' ),
			'settings'    => 'button_color',
			'section'     => 'section_primary_color',	
			'priority' => 100,			   
		)
	)
);

//Scroll Up color options
$wp_customize->add_setting('scrollup_color', array(
	'default' 			=> $default['scrollup_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'scrollup_color',
		array(
			'label'       => esc_html__( 'Scroll Up Color', 'Astound' ),
			'settings'    => 'scrollup_color',
			'section'     => 'section_primary_color',	
			'priority' => 100,			   
		)
	)
);

// Header Color Section.
$wp_customize->add_section( 'section_header_color',
	array(
		'title'      => esc_html__( 'Header Colors', 'Astound' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//Background color options
$wp_customize->add_setting('header_bg_color', array(
	'default' 			=> $default['header_bg_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'header_bg_color',
		array(
			'label'       => esc_html__( 'Header Background Color', 'Astound' ),
			'settings'    => 'header_bg_color',
			'section'     => 'section_header_color',	
			'priority' => 100,			   
		)
	)
);

//Menu color options
$wp_customize->add_setting('menu_color', array(
	'default' 			=> $default['menu_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'menu_color',
		array(
			'label'       => esc_html__( 'Menu Text Color', 'Astound' ),
			'settings'    => 'menu_color',
			'section'     => 'section_header_color',	
			'priority' => 100,			   
		)
	)
);

//Menu hover color options
$wp_customize->add_setting('menu_hover_color', array(
	'default' 			=> $default['menu_hover_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'menu_hover_color',
		array(
			'label'       => esc_html__( 'Active Menu + Hover Color', 'Astound' ),
			'settings'    => 'menu_hover_color',
			'section'     => 'section_header_color',	
			'priority' => 100,			   
		)
	)
);

// Heading Color Section.
$wp_customize->add_section( 'section_heading_color',
	array(
		'title'      => esc_html__( 'Heading(H1 - H6) Colors', 'Astound' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//Headings color options
$wp_customize->add_setting('headings_color', array(
	'default' 			=> $default['headings_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'headings_color',
		array(
			'label'       => esc_html__( 'Headings(H1 - H6) Color', 'Astound' ),
			'settings'    => 'headings_color',
			'section'     => 'section_heading_color',	
			'priority' => 100,			   
		)
	)
);

// Meta Color Section.
$wp_customize->add_section( 'section_meta_color',
	array(
		'title'      => esc_html__( 'Post/Meta Colors', 'Astound' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);
//Meta color options
$wp_customize->add_setting('meta_color', array(
	'default' 			=> $default['meta_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'meta_color',
		array(
			'label'       => esc_html__( 'Meta Color', 'Astound' ),
			'settings'    => 'meta_color',
			'section'     => 'section_meta_color',	
			'priority' => 100,			   
		)
	)
);

//Anchor color options
$wp_customize->add_setting('anchor_color', array(
	'default' 			=> $default['anchor_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'anchor_color',
		array(
			'label'       => esc_html__( 'Anchor/Link Color', 'Astound' ),
			'settings'    => 'anchor_color',
			'section'     => 'section_meta_color',	
			'priority' => 100,			   
		)
	)
);

// Footer Color Section.
$wp_customize->add_section( 'section_footer_color',
	array(
		'title'      => esc_html__( 'Footer Colors', 'Astound' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//Background color options
$wp_customize->add_setting('footer_bg_color', array(
	'default' 			=> $default['footer_bg_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'footer_bg_color',
		array(
			'label'       => esc_html__( 'Footer Background Color', 'Astound' ),
			'settings'    => 'footer_bg_color',
			'section'     => 'section_footer_color',	
			'priority' => 100,			   
		)
	)
);

//Footer text color options
$wp_customize->add_setting('footer_text_color', array(
	'default' 			=> $default['footer_text_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'footer_text_color',
		array(
			'label'       => esc_html__( 'Footer Text Color', 'Astound' ),
			'settings'    => 'footer_text_color',
			'section'     => 'section_footer_color',	
			'priority' => 100,			   
		)
	)
);

// Reset Color Section.
$wp_customize->add_section( 'section_reset_color',
	array(
		'title'      => esc_html__( 'Reset Color', 'Astound' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

// reset_colors
$wp_customize->add_setting( 'reset_colors', 
	array(
		'default'           => $default['reset_colors'],	
		'transport'         => 'postMessage',		
		'sanitize_callback' => 'Astound_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'reset_colors',
	array(
		'label'    		=> esc_html__( 'Reset Colors', 'Astound' ),
		'description' 	=>  esc_html__( 'This will replace all colors with default color of the theme. Please reload page to see changes.', 'Astound' ),
		'section'  		=> 'section_reset_color',
		'type'     		=> 'checkbox',
		'priority' 		=> 101,
	)
);

// Option Panel
$wp_customize->add_panel(
	'basic_panel', 
	array(
		'title'				=> esc_html__('Theme Options', 'Astound'),
		'priority' 			=> 90		
		)
);

// Header Section
$wp_customize->add_section(
	'header', 
	array(    
		'title'       => esc_html__('Header Options', 'Astound'),
		'panel'       => 'basic_panel'    
	)
);

$wp_customize->add_setting(
	'sticky', 
	array(
		'default'           => $default['sticky'],			
		'sanitize_callback' => 'Astound_sanitize_checkbox'
	)
);

$wp_customize->add_control(
	'sticky', 
	array(
		'label'       => esc_html__('Disable Sticky Header', 'Astound'),
		'section'     => 'header',   
		'settings'    => 'sticky',		
		'type'        => 'checkbox'
	)
);

// Post Options Section
$wp_customize->add_section(
	'post_options', 
	array(    
		'title'       => esc_html__('Post Options', 'Astound'),
		'panel'       => 'basic_panel'    
	)
);

$wp_customize->add_setting(
	'excerpt_length', 
	array(
		'default' 			=> $default['excerpt_length'],		
		'sanitize_callback' => 'Astound_sanitize_positive_integer'
	)
);

$wp_customize->add_control(
	'excerpt_length', 
	array(		
		'label' 		=> esc_html__('Excerpt Length', 'Astound'),
		'description' 	=> esc_html__( 'Select number of words to display in excerpt', 'Astound' ),
		'section' 		=> 'post_options',
		'settings'  	=> 'excerpt_length',
		'type'      	=> 'number',
		'input_attrs' 	=> array(
								'min' 	=> 20,		
								'max' 	=> 220,
								'step'  => 1
							),			
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'global_layout',
	array(
		'default'           => $default['global_layout'],
		'sanitize_callback' => 'Astound_sanitize_select',
	)
);
$wp_customize->add_control( 'global_layout',
	array(
		'label'    => esc_html__( 'Sidebar', 'Astound' ),
		'section'  => 'post_options',
		'type'     => 'radio',
		'choices'  => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'Astound' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'Astound' ),
				'no-sidebar'    => esc_html__( 'No Sidebar', 'Astound' ),
			),
	)
);

// Footer Section
$wp_customize->add_section(
	'footer', 
	array(    
		'title'       => esc_html__('Footer Options', 'Astound'),
		'panel'       => 'basic_panel'    
	)
);

$wp_customize->add_setting(
	'copyright', 
	array(
		'default' 			=>  $default['copyright'],
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'copyright', 
	array(
		'label'       => esc_html__('Copyright Text', 'Astound'),
		'description' => esc_html__('Copyright text of the site', 'Astound'),
		'settings'    => 'copyright',
		'section'     => 'footer',
		'type'        => 'text'
	)
);

// ScrollUp Section
$wp_customize->add_section(
	'scrollup', 
	array(    
		'title'       => esc_html__('Scroll Up Options', 'Astound'),
		'panel'       => 'basic_panel'    
	)
);

$wp_customize->add_setting(
	'enable_scrollup', 
	array(
		'default'           => $default['enable_scrollup'],			
		'sanitize_callback' => 'Astound_sanitize_checkbox'
	)
);

$wp_customize->add_control(
	'enable_scrollup', 
	array(
		'label'       => esc_html__('Disable Scroll Up', 'Astound'),
		'section'     => 'scrollup',   
		'settings'    => 'enable_scrollup',		
		'type'        => 'checkbox'
	)
);