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
class Widget_Minera_carousel extends Widget_Base {
	public function get_name() {
		return 'minera_carousel';
	}
	public function get_title() {
		return 'Minera carousel';
	}
	public function get_icon() {
		return 'eicon-slider-push';
	}
	public function get_categories()
	{
		return [ 'minera_category' ];
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'section_image_carousel',
			[
				'label' => __( 'Image Carousel', 'minera' ),
			]
		);

		$this->add_control(
			'carousel',
			[
				'label' => __( 'Add Images', 'minera' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
			]
		);

		$slides_to_show = range( 1, 10 );

		$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

		$this->add_responsive_control(
			'slides_to_show',
			[
				'label' => __( 'Slides to Show', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Default', 'minera' ),
				] + $slides_to_show,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'Slides to Scroll', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => $slides_to_show,
				'condition' => [
					'slides_to_show!' => '1',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'image_stretch',
			[
				'label' => __( 'Image Stretch', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'no' => __( 'No', 'minera' ),
					'yes' => __( 'Yes', 'minera' ),
				],
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'both',
				'options' => [
					'both' => __( 'Arrows and Dots', 'minera' ),
					'arrows' => __( 'Arrows', 'minera' ),
					'dots' => __( 'Dots', 'minera' ),
					'none' => __( 'None', 'minera' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'link_to',
			[
				'label' => __( 'Link to', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => __( 'None', 'minera' ),
					'file' => __( 'Media File', 'minera' ),
					'custom' => __( 'Custom URL', 'minera' ),
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label' => 'Link to',
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'http://your-link.com', 'minera' ),
				'condition' => [
					'link_to' => 'custom',
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'open_lightbox',
			[
				'label' => __( 'Lightbox', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Default', 'minera' ),
					'yes' => __( 'Yes', 'minera' ),
					'no' => __( 'No', 'minera' ),
				],
				'condition' => [
					'link_to' => 'file',
				],
			]
		);

		$this->add_control(
			'caption_type',
			[
				'label' => __( 'Caption', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'minera' ),
					'title' => __( 'Title', 'minera' ),
					'caption' => __( 'Caption', 'minera' ),
					'description' => __( 'Description', 'minera' ),
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'minera' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => __( 'Additional Options', 'minera' ),
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause on Hover', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'minera' ),
					'no' => __( 'No', 'minera' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'minera' ),
					'no' => __( 'No', 'minera' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => __( 'Autoplay Speed', 'minera' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'infinite',
			[
				'label' => __( 'Infinite Loop', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'minera' ),
					'no' => __( 'No', 'minera' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __( 'Effect', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => __( 'Slide', 'minera' ),
					'fade' => __( 'Fade', 'minera' ),
				],
				'condition' => [
					'slides_to_show' => '1',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Animation Speed', 'minera' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 500,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'direction',
			[
				'label' => __( 'Direction', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'ltr',
				'options' => [
					'ltr' => __( 'Left', 'minera' ),
					'rtl' => __( 'Right', 'minera' ),
				],
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_navigation',
			[
				'label' => __( 'Navigation', 'minera' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'arrows', 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'heading_style_arrows',
			[
				'label' => __( 'Arrows', 'minera' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_position',
			[
				'label' => __( 'Arrows Position', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'inside',
				'options' => [
					'inside' => __( 'Inside', 'minera' ),
					'outside' => __( 'Outside', 'minera' ),
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_size',
			[
				'label' => __( 'Arrows Size', 'minera' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-carousel-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-image-carousel-wrapper .slick-slider .slick-next:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label' => __( 'Arrows Color', 'minera' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-image-carousel-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-image-carousel-wrapper .slick-slider .slick-next:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'heading_style_dots',
			[
				'label' => __( 'Dots', 'minera' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_position',
			[
				'label' => __( 'Dots Position', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'outside',
				'options' => [
					'outside' => __( 'Outside', 'minera' ),
					'inside' => __( 'Inside', 'minera' ),
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_size',
			[
				'label' => __( 'Dots Size', 'minera' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .slick-dots li button:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Dots Color', 'minera' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .slick-dots li button:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);
		$this->end_controls_section(); 

		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'minera' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_spacing',
			[
				'label' => __( 'Spacing', 'minera' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Default', 'minera' ),
					'custom' => __( 'Custom', 'minera' ),
				],
				'default' => '',
				'condition' => [
					'slides_to_show!' => '1',
				],
			]
		);

		$this->add_control(
			'image_spacing_custom',
			[
				'label' => __( 'Image Spacing', 'minera' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 20,
				],
				'show_label' => false,
				'selectors' => [
					'{{WRAPPER}} .slick-list' => 'margin-left: -{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .slick-slide .slick-slide-inner' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'image_spacing' => 'custom',
					'slides_to_show!' => '1',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .slick-slide-image',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'minera' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .slick-slide-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_caption',
			[
				'label' => __( 'Caption', 'minera' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'caption_type!' => '',
				],
			]
		);

		$this->add_control(
			'caption_align',
			[
				'label' => __( 'Alignment', 'minera' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'minera' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'minera' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'minera' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'minera' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .elementor-image-carousel-caption' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'caption_text_color',
			[
				'label' => __( 'Text Color', 'minera' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-image-carousel-caption' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'caption_typography',
				'label' => __( 'Typography', 'minera' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .elementor-image-carousel-caption',
			]
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings();

		if ( empty( $settings['carousel'] ) ) {
			return;
		}

		$slides = [];

		foreach ( $settings['carousel'] as $index => $attachment ) {
			$image_url = Group_Control_Image_Size::get_attachment_image_src( $attachment['id'], 'thumbnail', $settings );

			$image_html = '<img class="slick-slide-image" src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( Control_Media::get_image_alt( $attachment ) ) . '" />';

			$link = $this->get_link_url( $attachment, $settings );

			if ( $link ) {
				$link_key = 'link_' . $index;

				$this->add_render_attribute( $link_key, [
					'href' => $link['url'],
					'class' => 'elementor-clickable',
					'data-elementor-open-lightbox' => $settings['open_lightbox'],
					'data-elementor-lightbox-slideshow' => $this->get_id(),
					'data-elementor-lightbox-index' => $index,
				] );

				if ( ! empty( $link['is_external'] ) ) {
					$this->add_render_attribute( $link_key, 'target', '_blank' );
				}

				if ( ! empty( $link['nofollow'] ) ) {
					$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
				}

				$image_html = '<a ' . $this->get_render_attribute_string( $link_key ) . '>' . $image_html . '</a>';
			}

			$image_caption = $this->get_image_caption( $attachment );

			$slide_html = '<div class="slick-slide"><figure class="slick-slide-inner">' . $image_html;

			if ( ! empty( $image_caption ) ) {
				$slide_html .= '<figcaption class="elementor-image-carousel-caption">' . $image_caption . '</figcaption>';
			}

			$slide_html .= '</figure></div>';

			$slides[] = $slide_html;

		}

		if ( empty( $slides ) ) {
			return;
		}

		$this->add_render_attribute( 'carousel', 'class', 'elementor-image-carousel' );

		if ( 'none' !== $settings['navigation'] ) {
			if ( 'dots' !== $settings['navigation'] ) {
				$this->add_render_attribute( 'carousel', 'class', 'slick-arrows-' . $settings['arrows_position'] );
			}

			if ( 'arrows' !== $settings['navigation'] ) {
				$this->add_render_attribute( 'carousel', 'class', 'slick-dots-' . $settings['dots_position'] );
			}
		}

		if ( 'yes' === $settings['image_stretch'] ) {
			$this->add_render_attribute( 'carousel', 'class', 'slick-image-stretch' );
		}

		?>
		<div class="elementor-image-carousel-wrapper elementor-slick-slider" dir="<?php echo $settings['direction']; ?>">
			<div <?php echo $this->get_render_attribute_string( 'carousel' ); ?>>
				<?php echo implode( '', $slides ); ?>
			</div>
		</div>
		<?php
	}


	private function get_link_url( $attachment, $instance ) {
		if ( 'none' === $instance['link_to'] ) {
			return false;
		}

		if ( 'custom' === $instance['link_to'] ) {
			if ( empty( $instance['link']['url'] ) ) {
				return false;
			}

			return $instance['link'];
		}

		return [
			'url' => wp_get_attachment_url( $attachment['id'] ),
		];
	}


	private function get_image_caption( $attachment ) {
		$caption_type = $this->get_settings( 'caption_type' );

		if ( empty( $caption_type ) ) {
			return '';
		}

		$attachment_post = get_post( $attachment['id'] );

		if ( 'caption' === $caption_type ) {
			return $attachment_post->post_excerpt;
		}

		if ( 'title' === $caption_type ) {
			return $attachment_post->post_title;
		}

		return $attachment_post->post_content;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_carousel() );