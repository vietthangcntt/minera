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
		$this->add_control(
			'number_post',
			[
				'label' => esc_html__('Number Post' , 'minera'),
				'type'  => Controls_Manager:: SELECT,
				'default' => '2',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
			]
		);


		$this->end_controls_section();

	}
	protected function render()
	{	
		$settings = $this-> get_settings_for_display();
		$count    = $settings['number_post'];
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = [
			'post' => 'blogs',
			'posts_per_page' => $count,
			'paged'          => $paged,
		];
		$blogs = new \WP_Query( $args );
		$total_page = $blogs->max_num_pages;
		if ( $blogs->have_posts() ) {
			echo '<div>';
			while ( $blogs->have_posts() ) {
				$blogs->the_post();
				?>
					<a> <?php echo get_the_post_thumbnail(); ?> </a>
					<h2> <?php echo get_the_title(); ?> </h2>
					<div class="entry-meta">
						<?php
							minera_posted_on();
							minera_posted_by();
						?>
					</div>
					<div class="decription">
						<?php echo the_content(); ?>
					</div>
				<?php
				
			}
			echo '</div>';
			wp_reset_postdata();


			theme_paging( $blogs );
		} 
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Shop() );