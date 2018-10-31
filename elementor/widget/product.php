<?php 
namespace Elementor;
if ( !class_exists('woocommerce') ) {
	return '';
}
/**
 * 
 */
class Widget_Minera_Product extends Widget_Base
{
	public function get_name()
	{
		return 'products';
	}
	public function get_title()
	{
		return esc_html__( 'Products', 'minera' );
	}
	public function get_icon()
	{
		return 'fa fa-heart';
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
				'label'   => esc_html__( 'Products', 'minera' ),
			]
		);
		$this->add_control(
			'col',
			[
				'label'   => esc_html__( 'Products per row', 'minera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => 1,
					'2' => 2,
					'3' => 3,
					'4' => 4
				]
			]
		);
		$this->add_control(
			'row',
			[
				'label'    => esc_html__( 'Row per Page', 'minera' ),
				'type'     => Controls_Manager::SELECT,
				'default'  => '4',
				'options'  => [
					'1' => 1,
					'2' => 2,
					'3' => 3,
					'4' => 4,
					'5' => 5,
					'6' => 6
				]
			]
		);
		$this->end_controls_section();
	}
	protected function render()
	{
		$settings = $this-> get_settings_for_display();
		$count    = $settings['col']*$settings['row'];
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = [
			'post_type'      => 'product',
			'posts_per_page' => $count,
			'paged'          => $paged,
		];
		$products = new \WP_Query($args);
		$total_page = $products->max_num_pages;
		echo "<ul class='row products columns-".$settings['col']."'>";
		if ($products->have_posts()) {
			
		
			while ( $products->have_posts() ) : $products->the_post();
				global $product;
				wc_get_template_part('content','product');
			endwhile;
			
			wp_reset_query();
			echo "</ul>";
			minera_product_pagination($total_page);
		}
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Product() );