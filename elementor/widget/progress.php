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

class widget_Minera_progress extends Widget_Base {
	public function get_name() {
		return 'minera_progress';
	}
	public function get_title() {
		return esc_html__('Minera Progress' ,'minera' );
	}
	public function get_icon() {
		return 'eicon-skill-bar';
	}
	public function get_categories() {
		return ['minera_category'];
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'section_progress',
			[
				'label'  => esc_html__('Progress Bar'),
			] 
		);

		$this->add_control(
			'title',
			[
				'label'   => esc_html__('Title', 'minera'),
				'type'    => Controls_Manager::TEXT,
				'placeholder'  => esc_html__('Enter your title' , 'minera' ),
				'default'   =>  esc_html__('My skill', 'minera'),
				'label_lock'  => true,
			]
		);

		$this->add_control(
			'progress_type',
			[
				'label'   => esc_html__('Type' , 'minera'),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''  => esc_html__('Default' ,'minera'),
					'info'  => esc_html__('info', 'minera' ),
					'success' => esc_html__('success' , 'minera'),
					'warning' => esc_html__('warning', 'minera' ),
					'danger'  => esc_html__('danger','minera'),

				],

			]
		);

		$this->add_control(
			'percent', 
			[
				'label'  => esc_html__('percentage','minera'),
				'type'   => Controls_Manager::SLIDER,
				'default' => [
					'size'  => 50,
					'unit'  => '%',
				],
				'label_lock'  => true,
				'sections'    => [
					'{{WRAPPER}} .elementor-progress-wrapper  '  => 'width: {{SIZE}}{{UNIT}};'
				],
 			]
		);

		$this->add_Control(
			'display_percentage',

			[
				'label'  => esc_html__('Display Percentage', 'minera'),
				'type'   => Controls_Manager::SELECT,
				'default'  => 'show',
				'options' => [
					'show'  => esc_html__('show','minera'),
					'hiden' => esc_html__('hiden' ,'minera'),
				],
			]
		);

		$this->add_control(
			'inner_text',
			[
				'label' => esc_html__( 'Inner Text', 'minera' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'e.g. Web Designer', 'minera' ),
				'default' => esc_html__( 'Web Designer', 'minera' ),
				'label_block' => true,
			]
		);

		$this->add_Control(
			'view',
			[
				'label'  => esc_html__('View','minera'),
				'type'   => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'section_progress_style',
			[
				'label' => __( 'Progress Bar', 'minera' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bar_color',

			[
				'label'   => esc_html__('Color' ,'minera'),
				'type'    => Controls_Manager::COLOR,
				'scheme'  => [
					'type'  => Scheme_Color:: get_type(),
					'value' => Scheme_Color:: COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .skin-bar' => 'background-color: {{VALUE}};',
				]

			]
		);

		$this->add_control(
			'bar_bg_color',
			[
				'label' => __( 'Background Color', 'minera' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #thing-demo' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bar_inline_color',
			[
				'label' => __( 'Inner Text Color', 'minera' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skin-bar span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Title Style', 'minera' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'minera' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .elementor-title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$this->add_render_attribute( 'wrapper', [
			'class' => 'elementor-progress-wrapper',
			'role' => 'progressbar',
			'aria-valuemin' => '0',
			'aria-valuemax' => '100',
			'aria-valuenow' => $settings['percent']['size'],
			'aria-valuetext' => $settings['inner_text']
		] );

		if ( ! empty( $settings['progress_type'] ) ) {
			$this->add_render_attribute( 'wrapper', 'class', 'progress-' . $settings['progress_type'] );
		}

		$this->add_render_attribute( 'progress-bar', [
			'class' => 'elementor-progress-bar',
			'data-max' => $settings['percent']['size'],
		] );

		if ( ! empty( $settings['title'] ) ) { ?>
			<span class="elementor-title"><?php echo $settings['title']; ?></span>
		<?php } ?>


		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<div id="thing-demo">
            	<div class="skin-bar" data-per="<?php echo $settings['percent']['size']; ?>">
					<span class="elementor-progress-text"><?php echo $settings['inner_text']; ?></span>
					<?php if ( 'hiden' != $settings['display_percentage'] ) { ?>
						<span class="elementor-progress-percentage"><?php echo $settings['percent']['size']; ?>%</span>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
plugin::instance()->widgets_manager->register_widget_type( new widget_Minera_progress() );