<?php
/**
 * minera Theme Customizer
 *
 * @package minera
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function minera_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'minera_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'minera_customize_partial_blogdescription',
		) );
	}
	$wp_customize->add_section( "footer" , array(
		'title'       => __( "Footer" , "minera" ),
		'priority'    => 130,
		'description' => __( 'Setting footer here' , 'minera'),
		
		));
/*
*/
	$wp_customize->add_setting( "coupon" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'minera_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'coupon',array(
		'label'    => __( 'Coupon', 'minera' ),
		'section'  => 'footer',
		'settings' => 'coupon',
		'type'     => 'textarea'
		)));
	$wp_customize->get_setting( 'coupon' )->transport = 'postMessage';
	$wp_customize->add_setting( "subcribe" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'minera_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'subcribe',array(
		'label'    => __( 'Subcribe', 'minera' ),
		'section'  => 'footer',
		'settings' => 'subcribe',
		'type'     => 'textarea'
		)));
	$wp_customize->get_setting( 'subcribe' )->transport = 'postMessage';
		$wp_customize->add_setting( "menu_footer" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'minera_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'menu_footer',array(
		'label'    => __( 'Menu Footer here', 'minera' ),
		'section'  => 'footer',
		'settings' => 'menu_footer',
		'type'     => 'textarea'
		)));
	$wp_customize->get_setting( 'menu_footer' )->transport = 'postMessage';
	$wp_customize->add_setting( "contact" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'minera_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'contact',array(
		'label'    => __( 'Contact Us', 'minera' ),
		'section'  => 'footer',
		'settings' => 'contact',
		'type'     => 'textarea'
		)));
	$wp_customize->get_setting( 'contact' )->transport = 'postMessage';
}
add_action( 'customize_register', 'minera_customize_register' );
function minera_text_field($str){
	return $str;
}
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function minera_customize_partial_blogname() {
	bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function minera_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function minera_customize_preview_js() {
	wp_enqueue_script( 'minera-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'minera_customize_preview_js' );
