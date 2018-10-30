<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Elementor minera icon box widget.
 *
 * Elementor widget that displays an icon, a headline and a text.
 *
 * @since 1.0.0
 */
/**
 * 
 */
class Widget_Minera_icon extends Widget_Base
{
	
	public function get_name()
	{
		return "minera_icon";
	}
	public function get_title()
	{
		return __( 'Minera Icon', 'minera' );
	}
	public function get_icon()
	{
		return "fa fa-apple";
	}
	public function get_categories()
	{
		return [ 'minera_category' ];
	}
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_icon',
			[
				'label'=> esc_html( 'Icon', 'minera' )
			]
		);
		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'minera' ),
				'type'        => Controls_Manager::ICON,
				'input_type'  => 'icon',
				'placeholder' => 'fa fa-apple'
			]
		);
		$this->add_control(
			'title_header',
			[
				'label'       => esc_html__( "Title & Description", 'minera' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'placeholder' => esc_html__('Enter your title', 'minare' ),
				'labek_block' => true
			]
		);
		$this->add_control(
			'description',
			[
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter Description', 'minera' ),
				'show_lable'  => false
			]
		);
		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link To', 'minera' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://yourlink.com', 'minera' )
			]
		);
		$this->add_control(
			'position',
			[
				'label'        => esc_html__( 'Icon Position', 'minera' ),
				'type'         => Controls_Manager::CHOOSE,
				'default'      => 'center',
				'options'      => [
					'left'  => [
						'title' => __( 'Left', 'minera' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'  => [
						'title' => esc_html__( 'Center', 'minera' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'=> [
						'title' => esc_html__( 'Right', 'minera' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .minera_icon_box' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_size',
			[
				'label'     => esc_html__( 'Title HTML Tag', 'minera' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'span' => 'span',
					'div'  => 'div',
					'p'    =>'p'
				],
				'default'  => 'h3'
			]
		);

		$this->end_controls_section();


		$this->start_controls_section (
			'style',
			[
				'label'   => esc_html__('icon', 'minera'),
				'tab'     => Controls_Manager:: TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__('Title color', 'minera'),
				'type'      => Controls_Manager::COLOR,
				'scheme'  => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-title' => 'color: {{VALUE}}',
				]

			]
		);

		$this->add_control(
			'decription_color',
			[
				'label'   => esc_html__('Description color', 'minera'),
				'type'    => Controls_Manager::COLOR,
				'scheme'  => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .minera_icon_box p' => 'color: {{VALUE}}',
				]

			]
		);

		$this->add_responsive_control(
			'decription_size',
			[
				'label'     => esc_html__( 'Size', 'minera' ),
				'type'      => Controls_manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 10,
						'max' => 300
					]
				],
				'selectors' => [ '{{WRAPPER}}  .minera_icon_box p' => 'font-size: {{SIZE}}{{UNIT}};' ]
			]
		);

		$this->add_responsive_control(
			'size_title',
			[
				'label'     => esc_html__( 'Size title', 'minera' ),
				'type'      => Controls_manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 10,
						'max' => 300
					]
				],
				'selectors' => [ '{{WRAPPER}} .icon-box-title *' => 'font-size: {{SIZE}}{{UNIT}};' ]
			]
		);

		$this->start_controls_tab(
			'icon_hover_color',
			[
				'label'    => esc_html__( 'Hover', 'minera' )
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'minera' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [ '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
				'condition'  => [ 'view!' => 'default' ]
			]
		);

		$this->add_control(
			'icon-color', 
			[	'label'  => esc_html__('Icon color' ,'minera' ),
				'type'   => Controls_manager::COLOR,
				'scheme' => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors'  => [
					'{{WRAPPER}} .meria-icon' => 'color: {{VALUE}}',
				],

			]
		);
	
		$this->add_responsive_control(
			'spacing_icon',
			[
				'label'     => esc_html__( 'Spacing', 'minera' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 20,
						'max' => 250
					]
				],
				'selectors' =>[
					'{{WRAPPER}} .minera_icon_box .meria-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .minera_icon_box .meria-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'size_icon',
			[
				'label'     => esc_html__( 'Size', 'minera' ),
				'type'      => Controls_manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 10,
						'max' => 300
					]
				],
				'selectors' => [ '{{WRAPPER}}  .minera_icon_box .meria-icon .fa' => 'font-size: {{SIZE}}{{UNIT}};' ]
			]
		);
		$this->add_control(
			'hover_icon_color',
			[
				'label'      => esc_html__( 'Color hover', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'default'    => '#222222',
				'selectors'  => [
					'{{WRAPPER}}  .minera_icon_box .meria-icon .fa:hover' => 'color: {{VALUE}}'
				]
			]
		);
		$this->end_controls_tab();

		$this->end_controls_section();

	}
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$icon    = wp_oembed_get( $settings[ 'icon' ] );
		$title   = wp_oembed_get( $settings[ 'title_header' ] );
		$href    = $settings[ 'link' ];
		?>
		<div class=" minera_icon_box">
			<div class="meria-icon">
				<?php echo !empty( $settings[ 'link' ]['url']) ? '<a href="'.$settings["link"][ 'url' ].'">' : '' ?>
					<i class="<?php echo ($icon) ? $icon : $settings[ 'icon' ] ?>"></i>
				<?php echo !empty( $settings[ 'link' ][ 'url' ]) ? '</a>' : '' ?>
			</div>
			<div class="icon-box-title">
				<?php echo !empty( $settings[ 'link' ]['url']) ? '<a href="'.$settings["link"][ 'url' ].'">' : '' ?>
				
					<<?php echo $settings[ 'title_size' ] ?>><?php echo esc_html( $settings[ 'title_header' ] )?></<?php echo $settings['title_size'] ?>>
				<?php echo !empty( $settings[ 'link' ]['url']) ? '</a>' : '' ?>
				
			</div>
			<p><?php echo esc_html( $settings[ 'description' ] ); ?></p>

		</div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Icon() );