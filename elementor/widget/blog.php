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
		$settings = $this-> get_settings_for_display();
		$args = [
			'post' => 'blogs',
		];
		$blogs = new \WP_Query( $args );

		// The Loop
		if ( $blogs->have_posts() ) {
			echo '<div>';
			while ( $blogs->have_posts() ) {
				$blogs->the_post();
				echo "<a>" .get_the_post_thumbnail();
				echo "</a>";
				echo "<h2>" .get_the_title();
				echo "</h2>";
				echo "<div>" .the_content();
				echo "</div>";
				
			}
			echo '</div>';
			/* Restore original Post Data */
			wp_reset_postdata();
} 
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Shop() );