<?php 
namespace Elementor;
if ( !class_exists('woocommerce') ) {
	return '';
}
/**
 * 
 */
class Widget_Minera_Shop extends Widget_Base
{
	public function get_name()
	{
		return 'Blog';
	}
	public function get_title()
	{
		return esc_html__( 'Blogs', 'minera' );
	}
	public function get_icon()
	{
		return 'fa fa-audio-description';
	}
	public function get_keywords($value='')
	{
		return [ 'woocommerce', 'products' ];
	}
	public function get_categories($value='')
	{
		return [ "minera_category" ];
	}
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_prduct',
			[
				'label'   => esc_html__( 'Blogs', 'minera' ),
			]
		);
		$this->end_controls_section();
	}
	protected function render()
	{	
		if ( have_posts() ) :
				the_post();
				get_template_part( 'index' );
		endif; 
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Shop() );