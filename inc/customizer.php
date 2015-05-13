<?php
/**
 * The Box Theme Customizer
 *
 * @package thebox
 * @since thebox 1.0
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 */
function thebox_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	
	$wp_customize->add_section(
        'thalia_settings',
        array(
            'title' => 'Thalia Settings',
            'priority' => 35,
        )
    );
    
    $wp_customize->add_setting(
    	'title_textbox',
	    array(
	        'default' => 'MINIWEBSITE',
	    )
	);
	
	$wp_customize->add_control(
	    'title_textbox',
	    array(
	        'label' => 'Logo Text',
	        'section' => 'thalia_settings',
	        'type' => 'text',
	    )
	);
	
	$wp_customize->add_setting(
    	'party_checkbox',
	    array(
	        'default' => false,
	    )
	);
	
	$wp_customize->add_control(
	    'party_checkbox',
	    array(
	        'label' => 'Enable party mode',
	        'section' => 'thalia_settings',
	        'type' => 'checkbox',
	    )
	);
	
	$wp_customize->add_setting( 'party_voorimage',
	    array(
	        'default' => 'voor.png'
	    ) );
	$wp_customize->add_setting( 'party_zijimage',
	    array(
	        'default' => 'zij.png'
	    ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'party_voorimage', array(
	    'label'    => 'Party Image: Front',
	    'section'  => 'thalia_settings',
	    'settings' => 'party_voorimage',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'party_zijimage', array(
	    'label'    => 'Party Image: Side',
	    'section'  => 'thalia_settings',
	    'settings' => 'party_zijimage',
	) ) );
	
	$wp_customize->add_setting(
    	'party_letter',
	    array(
	        'default' => 'T',
	    )
	);
	
	$wp_customize->add_control(
	    'party_letter',
	    array(
	        'label' => 'Party T-Shirt Letter',
	        'section' => 'thalia_settings',
	        'type' => 'text',
	    )
	);
}
add_action( 'customize_register', 'thebox_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function thebox_customize_preview_js() {
	wp_enqueue_script( 'thebox_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'thebox_customize_preview_js' );
